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
		'navbar_priority',
		'homepage_priority',
		'sub_header',
		'slider_name',
		'slider_slogan',
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
			'show_navbar'   => null,
			'show_homepage' => null,
			'is_single'		=> false
		];

		$data = array_merge( $args, $defaults );

		$query = Category::where('status', 1);

		if (! empty($data['show_navbar'])) {
			$query->where('show_navbar', (bool) $data['show_navbar']);
			
			if ((bool) $data['show_navbar']) {
				$query->orderBy('navbar_priority', 1);
			}
		}

		if (! empty($data['show_homepage'])) {
			$query->where('show_homepage', (bool) $data['show_homepage']);
			
			if ((bool) $data['show_homepage']) {
				$query->orderBy('homepage_priority', 1);
			}
		}

		if ( $data['is_single'] ) {
			return $query->first();
		}

		return $query->get();
	}
}
