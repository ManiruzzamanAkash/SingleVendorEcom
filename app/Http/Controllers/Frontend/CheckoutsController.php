<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Coupon;
use Auth;

class CheckoutsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (Auth::check()) {
      $payments = Payment::orderBy('priority', 'asc')->get();
      return view('frontend.pages.checkouts', compact('payments'));
    } else {
      session()->flash('checkout_error', 'Please Login first to make your checkouts !!');
      return redirect()->route('login');
    }
  }

  public function success()
  {
    $id = session()->get('order_id');
    $order = Order::find($id);

    if (!is_null($order)) {
      return view('frontend.pages.order-success', compact('order'));
    }

    session()->flash('error', 'Sorry no order has been found by this orer no !!');
    return redirect()->route('index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if (Auth::check()) {

      $this->validate($request, [
        'name'  => 'required',
        'phone_no'  => 'required',
        'shipping_address'  => 'required',
        'payment_method_id'  => 'required'
      ]);

      $order = new Order();

      // check transaction ID has given or not
      if ($request->payment_method_id != 'cash_in') {
        if ($request->transaction_id == NULL || empty($request->transaction_id)) {
          session()->flash('sticky_error', 'Please give transaction ID for your payment');
          return back();
        }
      }

      $order->name = $request->name;
      $order->email = $request->email;
      $order->phone_no = $request->phone_no;
      $order->shipping_address = $request->shipping_address;
      $order->message = $request->message;
      $order->coupon_code = $request->coupon_code;
      $order->ip_address = request()->ip();
      $order->transaction_id = $request->transaction_id;
      if (Auth::check()) {
        $order->user_id = Auth::id();
      }

      $order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
      $order->save();

      // Decrement a coupon from that coupon code
      if (!is_null($request->coupon_code)) {
        $coupon = Coupon::where('code', $request->coupon_code)->first();
        if (!is_null($coupon)) {
          $coupon->total_quantity = $coupon->total_quantity - 1;
          $coupon->save();
        }
      }

      // Update Order Discount
      $custom_discount = Coupon::getDiscountAmount($request->coupon_code, Cart::totalItems(), Cart::totalAmounts(), false);
      $order->custom_discount = $custom_discount;
      $order->save();

      // Update Cart Items
      foreach (Cart::totalCarts() as $cart) {
        $cart->order_id = $order->id;
        $cart->save();
      }

      session()->flash('order_id', $order->id);
      session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
      return redirect()->route('checkouts.success');
    } else {
      session()->flash('checkout_error', 'Please Login first to make your checkouts !!');
      return redirect()->route('login');
    }
  }
}
