<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;

class BrandsController extends Controller
{

    public function index()
    {
        //
    }

    public function show($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        if (!is_null($brand)) {
          return view('frontend.pages.brands.show', compact('brand'));
        }else {
          session()->flash('errors', 'Sorry !! There is no brand by this URL');
          return redirect('/');
        }
    }

}
