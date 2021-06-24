<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Helpers\StringHelper;
use Image;
use File;

class ReportsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    return view('backend.pages.reports.index');
  }

  public function sell_report()
  {
    return view('backend.pages.reports.sell_report');
  }

  /**
   * sell_report_search
   *
   * @param Request $request
   * @return void
   */
  public function sell_report_search(Request $request)
  {
    $request->validate([
      'start_date' => 'required|date',
      'end_date' => 'nullable|date',
    ]);
    $start_date = $request->start_date;
    if (!isset($request->end_date)) {
      $end_date = $start_date;
    }else{
      $end_date = $request->end_date;
    }

    $orders = Order::whereBetween('created_at',  [$start_date, $end_date])->get();
    $searched = true;

    return view('backend.pages.reports.sell_report', compact('orders', 'searched'));
  }
}
