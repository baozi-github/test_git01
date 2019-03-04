<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    	return [
    		'id'=>$this->id,
			'phone'=>$this->phone,
			'created_at'=>$this->created_at,
		];


        //return parent::toArray($request);
    }
}
