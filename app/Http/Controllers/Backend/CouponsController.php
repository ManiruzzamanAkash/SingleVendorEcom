<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Helpers\StringHelper;
use Image;
use File;
use DataTables;

class CouponsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    if (request()->ajax()) {
      
      $coupons = Coupon::orderBy('id', 'desc')->get();
      
      $datatable = DataTables::of($coupons)
          ->addIndexColumn()
          ->addColumn(
              'action',
              function ($row) {
                  $csrf = "" . csrf_field() . "";
                  $method_delete = "" . method_field("post") . "";
                  $html = '';

                  $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.coupon.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

                  $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

                  $html .= '<script>
                              $("#deleteItem' . $row->id . '").click(function(){
                                  swal.fire({ title: "Are you sure?",text: "Coupon will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                  }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                              });
                            </script>';
                  
                  $deleteRoute =  route('admin.coupon.delete', $row->id);
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

          ->editColumn('discount_amount', function ($row) {
            if ($row->direct_amount_or_percentage) {
              return $row->discount_amount.' Taka';
          }else {
              return $row->discount_amount.' %';
          }
          })
          ->editColumn('is_order_discount', function ($row) {
              if ($row->is_order_discount) {
                  return '<span class="badge badge-success font-weight-100">Order Discount</span>';
              }else {
                  return '<span class="badge badge-info">Item Discount</span>';
              }
          });
      $rawColumns = ['action', 'discount_amount', 'is_order_discount', 'image'];
      return $datatable->rawColumns($rawColumns)
      ->make(true);
  }
    // $coupons = Coupon::orderBy('id', 'desc')->get();
    return view('backend.pages.coupons.index');
  }

  public function create()
  {
    return view('backend.pages.coupons.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title'  => 'required',
      'code'  => 'required|alphanum|unique:coupons',
      'is_order_discount'  => 'required',
      'discount_amount'  => 'required',
      'valid_date'  => 'required|date',
      'criteria_amount'  => 'required',
      'direct_amount_or_percentage'  => 'required',
    ],
    [
      'is_order_discount.required' => 'Please give coupon discount type'
    ]
    );

    $coupon = new Coupon();
    $coupon->title = $request->title;
    $coupon->code = $request->code;
    $coupon->is_order_discount = $request->is_order_discount;
    $coupon->discount_amount = $request->discount_amount;
    $coupon->valid_date = $request->valid_date;
    $coupon->criteria_amount = $request->criteria_amount;
    $coupon->total_quantity = $request->total_quantity;
    $coupon->direct_amount_or_percentage = $request->direct_amount_or_percentage;
    $coupon->description = $request->description;
    $coupon->save();

    session()->flash('success', 'A new coupon has added successfully !!');
    return redirect()->route('admin.coupons');
  }

  public function edit($id)
  {
    $coupon= Coupon::find($id);
    if (!is_null($coupon)) {
      return view('backend.pages.coupons.edit', compact('coupon'));
    }else {
      return resirect()->route('admin.coupons');
    }
  }


    public function update(Request $request, $id)
    {
      $coupon = Coupon::find($id);
      
      $this->validate($request, [
        'title'  => 'required',
        'code'  => 'nullable|unique:coupons,code,'.$coupon->id,
        'is_order_discount'  => 'required',
        'discount_amount'  => 'required',
        'valid_date'  => 'required|date',
        'criteria_amount'  => 'required',
        'direct_amount_or_percentage'  => 'required',
      ],
      [
        'is_order_discount.required' => 'Please give coupon discount type'
      ]
      );
  
      $coupon->title = $request->title;
      $coupon->code = $request->code;
      $coupon->is_order_discount = $request->is_order_discount;
      $coupon->discount_amount = $request->discount_amount;
      $coupon->valid_date = $request->valid_date;
      $coupon->criteria_amount = $request->criteria_amount;
      $coupon->total_quantity = $request->total_quantity;
      $coupon->direct_amount_or_percentage = $request->direct_amount_or_percentage;
      $coupon->description = $request->description;
      $coupon->save();
  
      session()->flash('success', 'Coupon has been updated successfully !!');
      return redirect()->route('admin.coupons');

    }

    public function delete($id)
    {
      $coupon = Coupon::find($id);
      if (!is_null($coupon)) {
        // Delete coupon image
        if (File::exists('images/coupons/'.$coupon->image)) {
          File::delete('images/coupons/'.$coupon->image);
        }
        $coupon->delete();
      }
      session()->flash('success', 'Coupon has deleted successfully !!');
      return back();

    }
}
