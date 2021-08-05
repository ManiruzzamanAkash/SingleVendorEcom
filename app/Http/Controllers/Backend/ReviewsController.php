<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Helpers\StringHelper;
use Carbon\Carbon;
use Image;
use File;
use DataTables;

class ReviewsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    if (request()->ajax()) {

      $reviews = Review::orderBy('id', 'asc')->get();

      $datatable = DataTables::of($reviews)
        ->addIndexColumn()
        ->addColumn(
          'action',
          function ($row) {
            $csrf = "" . csrf_field() . "";
            $method_delete = "" . method_field("post") . "";
            $html = '';

            $html .= '<a class="btn waves-effect waves-light btn-info btn-sm btn-circle ml-1 p-1 text-white" title="Approved Admin" id="editItem' . $row->id . '"><i class="fa fa-check"></i></a>';

            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

            $html .= '<script>
                        $("#deleteItem' . $row->id . '").click(function(){
                            swal.fire({ title: "Are you sure?",text: "Review will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                            }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                          });
                      </script>';
            $html .= '<script>
                        $("#editItem' . $row->id . '").click(function(){
                            swal.fire({ title: "Are you sure?",text: "Review will be approved !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, approved it!"
                            }).then((result) => { if (result.value) {$("#editPermanentForm' . $row->id . '").submit();}})
                          });
                      </script>';

            $deleteRoute =  route('admin.review.delete', $row->id);
            $html .= '
                  <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                      <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                              class="fa fa-check"></i> Confirm Permanent Delete</button>
                      <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                              class="fa fa-times"></i> Cancel</button>
                  </form>';
            $editRoute =  route('admin.review.approve', $row->id);
            $html .= '
                  <form id="editPermanentForm' . $row->id . '" action="' . $editRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                      <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                              class="fa fa-check"></i> Confirm Permanent Delete</button>
                      <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                              class="fa fa-times"></i> Cancel</button>
                  </form>';

            return $html;
          }
        )
        ->editColumn('user_id', function ($row) {
          $html = $row->user->first_name.' ';
          $html .= $row->user->last_name;
          $html .= '<br /> <br />'.$row->user->email;
          return $html;
        })

        ->editColumn('is_approved', function ($row) {
          if ($row->is_approved) {
              return '<span class="badge badge-success font-weight-100">Approved</span>';
          }else {
              return '<span class="badge badge-danger">Not Approved</span>';
          }
        })

        ->editColumn('created_at', function ($row) {
          $html = Carbon::parse($row->created_at)->format('d M Y');
          $html .= " (" . $row->created_at->diffForHumans() . ")";
          return $html;
        });
        $rawColumns = ['action','is_approved', 'user_id' , 'created_at'];
        return $datatable->rawColumns($rawColumns)
        ->make(true);
    }
    // $reviews = Review::orderBy('id', 'desc')->get();
    return view('backend.pages.reviews.index');
  }

  public function approve(Request $request, $id)
  {

    $review = Review::find($id);
    if (!is_null($review)) {
      $is_approved = $review->is_approved;
      if ($is_approved) {
        $review->is_approved = 0;
      }else{
        $review->is_approved = 1;
      }
    }
    $review->save();

    session()->flash('success', 'Review approve status has been changed successfully !!');
    return redirect()->route('admin.reviews');
  }

    public function delete($id)
    {
      $review = Review::find($id);
      if (!is_null($review)) {
        // Delete review image
        if (File::exists('images/reviews/'.$review->image)) {
          File::delete('images/reviews/'.$review->image);
        }
        $review->delete();
      }
      session()->flash('success', 'Review has deleted successfully !!');
      return back();

    }
}
