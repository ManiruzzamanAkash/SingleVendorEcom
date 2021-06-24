<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function search(Request $request, $search)
    {
    	$products = Product::where('title', 'like', '%'.$search.'%')
    						->orWhere('description', 'like', '%'.$search.'%')
    						->orWhere('price', 'like', '%'.$search.'%')
    						->select('id', 'title', 'slug', 'price', 'quantity')
    						->get();
    	return json_encode(['search' => $search, 'products' => $products]);
	}
	
    public function categorySearch(Request $request, $search)
    {
    	$categories = Category::where('name', 'like', '%'.$search.'%')
    						->orWhere('description', 'like', '%'.$search.'%')
    						->orWhere('slug', 'like', '%'.$search.'%')
    						->select('id', 'name', 'slug')
    						->get();
    	return json_encode(['search' => $search, 'categories' => $categories]);
    }
}
