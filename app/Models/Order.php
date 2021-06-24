<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public $fillable = [
    'user_id',
    'ip_address',
    'payment_id',
    'name',
    'phone_no',
    'shipping_address',
    'email',
    'message',
    'is_paid',
    'is_completed',
    'is_seen_by_admin',
    'transaction_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }

  public function payment()
  {
    return $this->belongsTo(Payment::class);
  }

  public function total_amounts()
  {
    $order = Order::find($this->id);
    $total = [];
    foreach($order->carts as $cart){
      $total[] = $cart->product_quantity * $cart->product->price;
    }
    return array_sum($total);
  }

}
