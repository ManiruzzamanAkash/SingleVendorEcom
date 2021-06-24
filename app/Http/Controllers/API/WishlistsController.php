<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Wishlist;

use Auth;

class WishlistsController extends Controller
{

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $user = User::where('api_token', $request->get('api_token'))->first();
    if (!empty($user)) {
      $product_id = $request->get('product_id');

      $this->validate($request, [
        'product_id' => 'required'
      ],
      [
        'product_id.required' => 'Please give a product'
      ]);

      $status = Wishlist::addItemWishlist($user->id, $product_id);
      if ($status == 'added') {
        return json_encode(['status' => 'success', 'Message' => 'Wishlist item added !!', 'totalItems' => Wishlist::totalItems($user->id)]);
      }else{
        return json_encode(['status' => 'success', 'Message' => 'Wishlist item removed !!', 'totalItems' => Wishlist::totalItems($user->id)]);
      }
      
    }

    return json_encode(['status' => 'error', 'Message' => 'Not Authenticated', 'totalItems' => 0]);
  }

  /**
   * check()
   *
   * Check if any item is in the wishlist or not
   * @param  Request $request Request
   * @return boolean           True if item in the wishlist, false otherwise
   */
  public function check($product_id, $api_token)
  {
    $user = User::where('api_token', $api_token)->first();
    if (!empty($user)) {
      $product_id = $product_id;
      $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $product_id)->first();
      if (!empty($wishlist)) {
        return json_encode(['status' => 'success']);
      }
      return json_encode(['status' => 'error']);
    }
    return json_encode(['status' => 'error']);
  }

}
