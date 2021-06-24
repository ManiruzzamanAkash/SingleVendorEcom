<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Review;

use Auth;

class ReviewController extends Controller
{

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $request->validate([
      'product_id' => 'required',
      'point' => 'required',
      'api_token' => 'required',
      'title' => 'required',
      'description' => 'required'
    ],
      [
        'product_id.required' => 'Please give a product'
      ]
    );
    $user = User::where('api_token', $request->get('api_token'))->first();
    if (!is_null($user)) {
      $review = new Review();
      $review->product_id = $request->get('product_id');
      $review->user_id = $user->id;
      $review->title = $request->get('title');
      $review->description = $request->get('description');
      $review->point = $request->get('point');

      if ($review->save()) {
        return json_encode(['status' => 'success', 'Message' => 'New Review has added successfully !!', 'totalItems' => 0]);
      }
    }

    return json_encode(['status' => 'error', 'Message' => 'Not Authenticated', 'totalItems' => 0]);
  }

}
