<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\searchRequest;
use App\Http\Resources\ProductCategoryResponse;
use App\Http\Resources\SysRotateResponse;
use App\Models\ProductCategory;
use App\Models\SysProduct;
use App\Models\SysRotate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //

	public function getRotate(Request $request)
	{
		$data = SysRotate::Show()->get();
		return SysRotateResponse::collection($data);  // 集合
//		return new SysRotateResponse($data); // json
	}

	public function getProductCategory(Request $request)
	{
		$data = ProductCategory::Show()->get();
		return ProductCategoryResponse::collection($data);
	}

	public function search(searchRequest $request)
	{
		$term = $request->input('term');
		$lng = $request->input('lng');
		$lat = $request->input('lat');
		$name = $request->input('name');
		$province = $request->input('name');
		$city = $request->input('name');
		$district = $request->input('district');
		//dd($lng,$lat);
		$query = SysProduct::query();
		$query->searchName($name);
		//$query->where('sys_products.name','like','%'.$name.'%');
		$query->select('sys_products.*');
		//$query->getDistance((string)$lng,(string)$lat); // 可以传递参数 从第二个参数开始传递
		$data = $query->get();
		dd($data);
	}


}
