<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Category;

class PagesController extends Controller
{
	public function index()
	{
		$sliders = Slider::orderBy('priority', 'asc')->get();
		$products = Product::orderBy('id', 'desc')->paginate(9);
		$categories = Category::orderBy('id', 'desc')->get();
		return view('frontend.pages.index', compact('products', 'sliders', 'categories'));
	}

	public function contact()
	{
		return view('frontend.pages.contact');
	}

	/**
	 * Search Product List Page
	 *
	 * @param Request $request
	 * @return void
	 */
	public function search(Request $request)
	{
		$search = $request->search;

		$query = Product::where('title', '!=', null);

		if ($request->offer) {
			$query->where('discount', '!=', null)
				->where('discount', '>=', intval($request->offer));
		}

		$query->where(function ($q) use ($search) {
			$q->where('title', 'like', '%' . $search . '%')
				->orWhere('description', 'like', '%' . $search . '%')
				->orWhere('slug', 'like', '%' . $search . '%')
				->orWhere('price', 'like', '%' . $search . '%')
				->orWhere('quantity', 'like', '%' . $search . '%')
				->orWhere('occation', 'like', '%' . $search . '%')
				->orWhere('slogan', 'like', '%' . $search . '%');
		});

		$products = $query->orderBy('id', 'desc')->paginate(20);

		return view('frontend.pages.product.search', compact('search', 'products'));
	}
}
