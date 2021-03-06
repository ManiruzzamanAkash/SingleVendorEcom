<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function images()
  {
    return $this->hasMany(ProductImage::class);
  }

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }

  public function recommended($limit = 8)
  {
    return $this->category->products()->where('id', '!=', $this->id)->paginate($limit);
  }
}
