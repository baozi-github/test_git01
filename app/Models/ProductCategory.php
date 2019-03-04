<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
	protected $table = 'product_categories';

	const PRODUCT_CATEGORY_SHOW_ON = 1;

	public function scopeShow($query)
	{
		return $query->where('is_show',self::PRODUCT_CATEGORY_SHOW_ON);
	}

}
