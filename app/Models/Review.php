<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  public $fillable = [
    'user_id',
    'product_id',
    'title',
    'description',
    'is_approved',
    'point'
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
