<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;
use Image;
use Auth;
use File;
use DataTables;

class ProductsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index(Request $request)
  {
  //   if (is_null($this->user) || !$this->user->can('blog.view')) {
  //     $message = 'You are not allowed to access this page !';
  //     return view('errors.403', compact('message'));
  // }

  //return $image = ProductImage::where('product_id', 3)->first();

    //  return $products = ProductImage::join('products', 'product_images.product_id', '=', 'products.id')->orderBy('products.id', 'desc')->get();
  // return  $products = Product::with('images')->orderBy('products.id', 'desc')->first()->images['0']->image;

  if (request()->ajax()) {
      
      $products = Product::orderBy('id', 'desc')->get();
      
      $datatable = DataTables::of($products)
          ->addIndexColumn()
          ->addColumn(
              'action',
              function ($row) {
                  $csrf = "" . csrf_field() . "";
                  $method_delete = "" . method_field("post") . "";
                  $html = '';

                  $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.product.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

                  $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

                  $html .= '<script>
                              $("#deleteItem' . $row->id . '").click(function(){
                                  swal.fire({ title: "Are you sure?",text: "Product will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                  }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                              });
                            </script>';
                  
                  $deleteRoute =  route('admin.product.delete', $row->id);
                  $html .= '
                  <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                      <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                              class="fa fa-check"></i> Confirm Permanent Delete</button>
                      <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                              class="fa fa-times"></i> Cancel</button>
                  </form>';
                  
                  return $html;
              }
          )

          ->editColumn('title', function ($row) {
              return $row->title;
          })
          ->editColumn('image', function ($row) {
              
                $productImage = ProductImage::where('product_id', $row->id)->first();
                if ($productImage->image != null) {
                  return "<img height='50px' width='50px' src='" . asset('images/products/'.$productImage->image) . "' class='img img-display-list' />";
                }
                return '-';
          })
          ->editColumn('status', function ($row) {
              if ($row->status) {
                  return '<span class="badge badge-success font-weight-100">Active</span>';
              }else {
                  return '<span class="badge badge-warning">Inactive</span>';
              }
          });
      $rawColumns = ['action', 'title', 'status', 'image'];
      return $datatable->rawColumns($rawColumns)
      ->make(true);
  }

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
      'discount'      => 'nullable|numeric',
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
      $product->offer_price = $request->price - (($request->price * $request->discount) / 100);
    } else {
      $product->discount    = null;
      $product->offer_price = 0;
    }

    $product->quantity       = $request->quantity;
    // discount
    $product->warranty      = $request->warranty;

    $product->slug        = Str::slug($request->title);
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
      'discount'             => 'nullable|numeric',
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
      $product->offer_price = $request->price - (($request->price * $request->discount) / 100);
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
      $pImage=ProductImage::where('product_id', $id)->get();
      foreach ($pImage as $productImage) {
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
