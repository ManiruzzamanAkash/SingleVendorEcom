<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductImage;
use Image;
use Auth;
use File;

class ProductsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $products = Product::orderBy('id', 'desc')->get();
    return view('backend.pages.product.index')->with('products', $products);
  }

  public function create()
  {
    return view('backend.pages.product.create');
  }

  public function edit($id)
  {
    $product = Product::find($id);
    return view('backend.pages.product.edit')->with('product', $product);
  }


  public function store(Request $request)
  {
    // return $request;
    $request->validate([
      'title'         => 'required|max: 150',
      'price'         => 'required|numeric',
      'delivery_time' => 'required',
      'discount'      => 'required|numeric',
      'quantity'      => 'required|numeric',
      'category_id'   => 'required|numeric',
      'brand_id'      => 'required|numeric',
    ]);

    $product = new Product();

    $product->title          = $request->title;
    $product->description    = $request->description;
    $product->occation       = $request->occation;
    $product->slogan         = $request->slogan;
    $product->delivery_time  = intval($request->delivery_time);
    $product->price          = $request->price;

    if ($request->discount) {
      $product->discount    = $request->discount;
      $product->offer_price = $request->price-(($request->price * $request->discount) / 100);
    } else {
      $product->discount    = null;
      $product->offer_price = 0;
    }

    $product->quantity       = $request->quantity;
    // discount
    $product->warranty      = $request->warranty;

    $product->slug        = str_slug($request->title);
    $product->category_id = $request->category_id;
    $product->brand_id    = $request->brand_id;
    $product->admin_id    = Auth::id();
    $product->save();

    //ProductImage Model insert image
    if (count($request->product_image) > 0) {
      $i = 1;
      foreach ($request->product_image as $image) {
        $img = time() . $i . '.' . $image->getClientOriginalExtension();
        $location = 'images/products/' . $img;
        Image::make($image)->save($location);

        $product_image = new ProductImage();
        $product_image->product_id = $product->id;
        $product_image->image = $img;
        $product_image->save();

        $i++;
      }
    }

    session()->flash('success', 'Product Item has been added successfully !!');
    return redirect()->route('admin.products');
  }
  public function update(Request $request, $id)
  {

    $request->validate([
      'title'         => 'required|max:150',
      'price'             => 'required|numeric',
      'discount'             => 'required|numeric',
      'delivery_time'             => 'required',
      'quantity'             => 'required|numeric',
      'category_id'             => 'required|numeric',
      'brand_id'             => 'required|numeric',
    ]);

    $product = Product::find($id);

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    if ($request->discount) {
      $product->discount    = $request->discount;
      $product->offer_price = $request->price-(($request->price * $request->discount) / 100);
    } else {
      $product->discount    = null;
      $product->offer_price = 0;
    }
    $product->occation = $request->occation;
    $product->slogan = $request->slogan;
    $product->delivery_time = $request->delivery_time;
    $product->quantity = $request->quantity;
    $product->warranty = $request->warranty;
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;
    $product->save();

    return redirect()->route('admin.products');
  }

  public function delete($id)
  {
    $product = Product::find($id);
    if (!is_null($product)) {
      // Delete product images
      foreach ($product->images as $productImage) {
        $image = $productImage->image;
        UploadHelper::deleteFile('images/products/' . $image);
        $productImage->delete();
      }

      // Delete carts
      foreach ($product->carts as $cart) {
        $cart->delete();
      }

      // Delete reviews
      foreach ($product->reviews as $review) {
        $review->delete();
      }

      $product->delete();
    }

    session()->flash('success', 'Product has deleted successfully !!');
    return back();
  }
}
