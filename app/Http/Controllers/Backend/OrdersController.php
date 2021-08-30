<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Carbon\Carbon;
use PDF;
use DataTables;

class OrdersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    
    if (request()->ajax()) {
      
      $orders = Order::with('carts')->orderBy('id', 'desc')->get();
      
      $datatable = DataTables::of($orders)
          ->addIndexColumn()
          ->addColumn(
              'action',
              function ($row) {
                  $csrf = "" . csrf_field() . "";
                  $method_delete = "" . method_field("post") . "";
                  $html = '';

                  $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.order.show', $row->id) . '"><i class="fa fa-eye"></i></a>';

                  $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

                  $html .= '<script>
                                    $("#deleteItem' . $row->id . '").click(function(){
                                        swal.fire({ title: "Are you sure?",text: "Order will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                        }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                                    });
                                </script>';
                  
                  $deleteRoute =  route('admin.order.delete', $row->id);
                  $html .= '
                  <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                      <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                              class="fa fa-check"></i> Confirm Permanent Delete</button>
                      <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                              class="fa fa-times"></i> Cancel</button>
                  </form>';
                  
                  return $html;
              }
          )

          ->editColumn('title', function ($row) {
              return $row->title;
          })

          ->editColumn('created_at', function ($row) {
            $html = Carbon::parse($row->created_at)->format('d M Y');
            $html .= " (" . $row->created_at->diffForHumans() . ")";
            return $html;
          })

          ->editColumn('custom_discount', function ($row) {
            $html = $row->custom_discount.' ৳';
            $html .= " <br />" . $row->shipping_charge .' ৳<i class="fas fa-info-circle"></i><span class="badge">Shipping charge</span>';
            return $html;
          })

          ->editColumn('message', function ($row) {
            $html = $row->total_amounts().' ৳';
            
            return $html;
          })

          ->editColumn('is_paid', function ($row) {
              if ($row->is_paid) {
                $html='<span class="badge badge-success p-1 m-1 font-weight-100">Paid</span> <br />';
                $html .= $row->is_completed?'<span class="badge badge-success p-1 m-1 font-weight-100">Completed</span> <br />':'<span class="badge badge-warning p-1 m-1 font-weight-100">Not Completed</span> <br />';
                $html .= $row->is_seen_by_admin?'<span class="badge badge-success p-1 m-1 font-weight-100">Seen</span> <br />':'<span class="badge badge-info p-1 m-1 font-weight-100">Unseen</span> <br />';

                return $html;
              }else {
                $html='<span class="badge badge-danger p-1 m-1 font-weight-100">Unpaid</span> <br />';
                $html .= $row->is_completed?'<span class="badge badge-success p-1 m-1 font-weight-100">Completed</span> <br />':'<span class="badge badge-warning p-1 m-1 font-weight-100">Not Completed</span> <br />';
                $html .= $row->is_seen_by_admin?'<span class="badge badge-success p-1 m-1 font-weight-100">Seen</span> <br />':'<span class="badge badge-info p-1 m-1 font-weight-100">Unseen</span> <br />';

                return $html;
              }
          });
      $rawColumns = ['action', 'title', 'status','created_at','is_paid','custom_discount','message'];
      return $datatable->rawColumns($rawColumns)
          ->make(true);
  }
    
    // $orders = Order::orderBy('id', 'desc')->get();
     return view('backend.pages.orders.index');
  }  

  public function show($id)
  {
    $order = Order::find($id);
    $order->is_seen_by_admin = 1;
    $order->save();
    return view('backend.pages.orders.show', compact('order'));
  }

  public function completed($id)
  {
    $order = Order::find($id);
    if ($order->is_completed) {
      $order->is_completed = 0;
    }
    else {
      $order->is_completed = 1;
    }

    $order->save();
    session()->flash('success', 'Order completed status changed ..!');
    return back();
  }

  public function chargeUpdate(Request $request, $id)
  {
    $order = Order::find($id);
    
    $order->shipping_charge = $request->shipping_charge;
    $order->custom_discount = $request->custom_discount;
    $order->save();
    session()->flash('success', 'Order charge and discount has changed ..!');
    return back();
  }

  /**
   * generate Invoice
   * 
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function generateInvoice($id)
  {
  	$order = Order::find($id);
  	
    //return view('backend.pages.orders.invoice', compact('order'));

    $pdf = PDF::loadView('backend.pages.orders.invoice', compact('order'));
    
    return $pdf->stream('invoice.pdf');
    //return $pdf->download('invoice.pdf');
  }

  public function paid($id)
  {
  	$order = Order::find($id);
  	if ($order->is_paid) {
  		$order->is_paid = 0;
  	}
  	else {
  		$order->is_paid = 1;
  	}
  	$order->save();
  	session()->flash('success', 'Order paid status changed ..!');
  	return back();
  }

    public function delivery($id)
  {
    $order = Order::find($id);
    if ($order->delivery_status) {
      $order->delivery_status = 0;
    }
    else {
      $order->delivery_status = 1;
    }
    $order->save();
    session()->flash('success', 'Order paid status changed ..!');
    return back();
  }

}
