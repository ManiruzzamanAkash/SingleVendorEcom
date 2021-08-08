<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'name',
		'show_navbar',
		'show_homepage',
		'status',
		'priority',
		'sub_header',
		'slider_name',
		'slider_slogan',
		'manage_home_slider',
		'slug',
		'description',
		'image',
		'parent_id',
	];

	public function parent()
	{
		return $this->belongsTo(Category::class, 'parent_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	/**
	 * ParentOrNotCategory
	 *
	 * Check is the category is child cateogy of that parent category
	 *
	 * @param int $parent_id
	 * @param int $child_id
	 */
	public static function ParentOrNotCategory($parent_id, $child_id)
	{
		$categories = Category::where('id', $child_id)->where('parent_id', $parent_id)->get();
		if (!is_null($categories)) {
			return true;
		} else {
			return false;
		}
	}

	public static function getCategories($args = []) {
		$defaults = [
			'show_navbar' => null,
			'show_homepage' => null,
		];

		$data = array_merge( $args, $defaults );

		$query = Category::where('status', 1);

		if()
	}
}
