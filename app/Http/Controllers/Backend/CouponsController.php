<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Helpers\StringHelper;
use Image;
use File;

class CouponsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    $coupons = Coupon::orderBy('id', 'desc')->get();
    return view('backend.pages.coupons.index', compact('coupons'));
  }

  public function create()
  {
    return view('backend.pages.coupons.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title'  => 'required',
      'code'  => 'required|alphanum|unique:coupons',
      'is_order_discount'  => 'required',
      'discount_amount'  => 'required',
      'valid_date'  => 'required|date',
      'criteria_amount'  => 'required',
      'direct_amount_or_percentage'  => 'required',
    ],
    [
      'is_order_discount.required' => 'Please give coupon discount type'
    ]
    );

    $coupon = new Coupon();
    $coupon->title = $request->title;
    $coupon->code = $request->code;
    $coupon->is_order_discount = $request->is_order_discount;
    $coupon->discount_amount = $request->discount_amount;
    $coupon->valid_date = $request->valid_date;
    $coupon->criteria_amount = $request->criteria_amount;
    $coupon->total_quantity = $request->total_quantity;
    $coupon->direct_amount_or_percentage = $request->direct_amount_or_percentage;
    $coupon->description = $request->description;
    $coupon->save();

    session()->flash('success', 'A new coupon has added successfully !!');
    return redirect()->route('admin.coupons');
  }

  public function edit($id)
  {
    $coupon= Coupon::find($id);
    if (!is_null($coupon)) {
      return view('backend.pages.coupons.edit', compact('coupon'));
    }else {
      return resirect()->route('admin.coupons');
    }
  }


    public function update(Request $request, $id)
    {
      $coupon = Coupon::find($id);
      
      $this->validate($request, [
        'title'  => 'required',
        'code'  => 'nullable|unique:coupons,code,'.$coupon->id,
        'is_order_discount'  => 'required',
        'discount_amount'  => 'required',
        'valid_date'  => 'required|date',
        'criteria_amount'  => 'required',
        'direct_amount_or_percentage'  => 'required',
      ],
      [
        'is_order_discount.required' => 'Please give coupon discount type'
      ]
      );
  
      $coupon->title = $request->title;
      $coupon->code = $request->code;
      $coupon->is_order_discount = $request->is_order_discount;
      $coupon->discount_amount = $request->discount_amount;
      $coupon->valid_date = $request->valid_date;
      $coupon->criteria_amount = $request->criteria_amount;
      $coupon->total_quantity = $request->total_quantity;
      $coupon->direct_amount_or_percentage = $request->direct_amount_or_percentage;
      $coupon->description = $request->description;
      $coupon->save();
  
      session()->flash('success', 'Coupon has been updated successfully !!');
      return redirect()->route('admin.coupons');

    }

    public function delete($id)
    {
      $coupon = Coupon::find($id);
      if (!is_null($coupon)) {
        // Delete coupon image
        if (File::exists('images/coupons/'.$coupon->image)) {
          File::delete('images/coupons/'.$coupon->image);
        }
        $coupon->delete();
      }
      session()->flash('success', 'Coupon has deleted successfully !!');
      return back();

    }
}
