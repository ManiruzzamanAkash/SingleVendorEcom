<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Cart;
use App\Http\Resources\CartResource;

use Auth;

class CartsController extends Controller
{

  public function index()
  {
    return CartResource::collection(Cart::totalCarts());
  }

  public function totalAmounts()
  {
    return Cart::totalAmounts();
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'product_id' => 'required'
    ],
    [
      'product_id.required' => 'Please give a product'
    ]);

    if (Auth::check()) {
      $cart = Cart::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }else {
      $cart = Cart::where('ip_address', Cart::getIp())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }

    if (!is_null($cart)) {
      $cart->increment('product_quantity');
    }else {
      $cart = new Cart();
      if (Auth::check()) {
        $cart->user_id = Auth::id();
      }
      $cart->ip_address = Cart::getIp();
      $cart->product_id = $request->product_id;
      $cart->save();
    }

    return json_encode(['status' => 'success', 'Message' => 'Item added to cart successfully !!', 'totalItems' => Cart::totalItems()]);
  }

  public function total()
  {
      return Cart::totalItems();
  }

  /**
   * cart Quantity Update
   * @param  Request $request 
   * @return response
   */
  public function cartQuantityUpdate(Request $request, $cart_id)
  {
    $this->validate($request, [
      'product_quantity' => 'required|numeric',
    ]);

    if ($request->product_quantity <= 0) {
      return json_encode(['success' => false, 'message' => 'Cart Quantity Can Not Less Than 0 !!']);
    }

    $cart = Cart::find($cart_id);
    $cart->product_quantity = $request->product_quantity;
    $cart->save();
    return json_encode(['success' => true, 'message' => 'Cart Quantity Updated Successfully!!']);
  }  

  public function destroy(Request $request, $cart_id)
  {
    $cart = Cart::find($cart_id);
    $cart->delete();
    return json_encode(['success' => true, 'message' => 'Cart Item Deleted Successfully !!']);
  }

}
