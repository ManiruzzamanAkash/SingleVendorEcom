<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Cart extends Model
{
  public $fillable = [
    'user_id',
    'ip_address',
    'product_id',
    'product_quantity',
    'order_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }


  /**
   * total carts
   * @return integer total cart model
   */
  public static function totalCarts()
  {
    $clientIP = Cart::getIp();
    // if (Auth::check()) {
    //   $carts = Cart::where('user_id', Auth::id())->orWhere('ip_address', request()->ip())->where('order_id', NULL)->get();
    // }else {
    //   $carts = Cart::where('ip_address', request()->ip())->where('order_id',NULL)->get();
    // }

    if (Auth::check()) {
      $carts = Cart::orWhere('ip_address', $clientIP)
        ->where('user_id', Auth::id())
        ->where('order_id', NULL)
        ->get();
    } else {
      $carts = Cart::where('ip_address', $clientIP)
        ->where('order_id', NULL)->get();
    }

    // $carts = Cart::all();
    return $carts;
  }

  /**
   * totalAmounts of Cart Items
   * 
   * @return 
   */
  public static function totalAmounts()
  {
    $total = [];
    foreach (Cart::totalCarts() as $cart) {
      $total[] = $cart->product_quantity * $cart->product->price;
    }
    return array_sum($total);
  }

  /**
   * total Items in the cart
   * @return integer total item
   */
  public static function totalItems()
  {
    $carts = Cart::totalCarts();
    $total_item = 0;

    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }
    return $total_item;
  }

  public static function getIp()
  {
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
      if (array_key_exists($key, $_SERVER) === true) {
        foreach (explode(',', $_SERVER[$key]) as $ip) {
          $ip = trim($ip); // just to be safe
          if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
            return $ip;
          }
        }
      }
    }
  }
}
