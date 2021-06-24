<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Coupon;
use App\Http\Resources\CartResource;

use Auth;
class CouponsController extends Controller
{
  public function search(Request $request)
  {
    $coupon_code = $request->get('coupon_code');
    $total_items = $request->get('total_items');
    $total_price = $request->get('total_price');

    if (!is_null(Coupon::getCoupon($coupon_code))){
      $discount_amount = 0;
      $discount_amount = Coupon::getDiscountAmount($coupon_code, $total_items, $total_price);
      return json_encode(['success' => true, 'discount_amount' => $discount_amount]);
    }
    return json_encode(['success' => false]);
  }
}
