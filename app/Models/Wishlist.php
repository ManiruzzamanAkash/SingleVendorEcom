<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  public $fillable = [
    'user_id',
    'product_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public static function totalItems($user_id)
  {
    $total = count(Wishlist::where('user_id', $user_id)->get());
    return $total;
  }

  public static function addItemWishlist($user_id, $product_id){
    $wishlist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
    if (empty($wishlist)) {
      $wishlist = new Wishlist();
      $wishlist->product_id = $product_id;
      $wishlist->user_id = $user_id;
      $wishlist->save();
      return 'added';
    }else{
      $wishlist->delete();
      return 'deleted';
    }
  }

}
