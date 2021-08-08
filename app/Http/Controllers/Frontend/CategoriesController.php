<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;

class CategoriesController extends Controller
{
	public function show($slug)
	{
		$category = Category::where('slug', $slug)->first();

		if (!is_null($category)) {
			return view('frontend.pages.categories.show', compact('category'));
		} else {
			$category = Category::find($slug);
			if (!is_null($category)) {
				return view('frontend.pages.categories.show', compact('category'));
			}
		}

		session()->flash('errors', 'Sorry !! There is no category by this slug');
		return redirect('/');
	}
}
