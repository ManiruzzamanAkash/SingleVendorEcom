<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Wishlist;
use Auth;

class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Sorry !! Login before access wishlist !!');
            return redirect()->route('index');
        }
        $products = Auth::user()->wishlist_products()->with(['product'])->paginate(20);
        return view('frontend.pages.wishlists', compact('products'));
    }

}
