<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Helpers\StringHelper;
use Image;
use File;

class ReviewsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $reviews = Review::orderBy('id', 'desc')->get();
    return view('backend.pages.reviews.index', compact('reviews'));
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
