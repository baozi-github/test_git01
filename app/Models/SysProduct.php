<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysProduct extends Model
{
    //

	protected $table = 'sys_products';
	protected $guarded = [];

	public function scopesearchName(object $query,string $name)
	{
		$query->where('sys_products.name','like','%'.$name.'%');
	}

	public function scopegetDistance(object $query,string $lng,string $lat)
	{
		$query->leftJoin('merchant_stores','sys_products.merchant_id','=','merchant_stores.merchant_id')
			->addSelect( DB::raw('(st_distance(point (lng,lat),point('.$lng.','.$lat.'))*111195)as distance'));
	}
}
