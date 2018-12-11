<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    
	static function slugify($slug){
		
	  // replace non letter or digits by -
	  $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);
	
	  // transliterate
	  if (function_exists('iconv')){
		$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
	  }
	
	  // remove unwanted characters
	  $slug = preg_replace('~[^-\w]+~', '', $slug);
	
	  // trim
	  $slug = trim($slug, '-');
	
	  // remove duplicate -
	  $slug = preg_replace('~-+~', '-', $slug);
	
	  // lowercase
	  $slug = strtolower($slug);
	
	  if (empty($slug)) {
		return 'n-a';
	  }
	
	  return $slug;
	}
}
