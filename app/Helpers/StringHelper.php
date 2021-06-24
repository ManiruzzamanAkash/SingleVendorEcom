<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StringHelper
{


  //For Generating Unique Slug
  public static function createSlug($title, $model, $field, $separator="-")
  {
    $model = 'App\Models\\'.$model;
    $id = 0;

    $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($title))));
    $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));
    $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));
    $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));

    // $slug = preg_replace('!['.preg_quote($separator).']+!u', $separator, $title);

    // // Remove all characters that are not the separator, letters, numbers, or whitespace.
    // $slug = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($slug));

    // // Replace all separator characters and whitespace by a single separator
    $slug = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $slug);


    // Get any that could possibly be related.
    // This cuts the queries down by doing it once.
    $allSlugs = StringHelper::getRelatedSlugs($slug, $id, $model, $field);
    // If we haven't used it before then we are all good.
    if (! $allSlugs->contains("$field", $slug)){
      return $slug;
    }
    // Just append numbers like a savage until we find not used.
    for ($i = 1; $i <= 10; $i++) {
      $newSlug = $slug.$separator.$i;
      if (! $allSlugs->contains("$field", $newSlug)) {
        return $newSlug;
      }
    }
    throw new \Exception('Can not create a unique slug');
  }

  protected static function getRelatedSlugs($slug, $id = 0, $model, $field)
  {
    return $model::select("$field")->where("$field", 'like', $slug.'%')
    ->where('id', '<>', $id)
    ->get();
  }



  public static function advanceUTFStrSlug($title, $separator='-')
  {
    // Convert all dashes/underscores into separator
    $flip = $separator == '-' ? '_' : '-';

    $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

    // Remove all characters that are not the separator, letters, numbers, or whitespace.
    $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

    // Replace all separator characters and whitespace by a single separator
    $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

    return trim($title, $separator);

  }

}
