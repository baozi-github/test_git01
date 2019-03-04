<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class searchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
//    	$name = $request->input('name');
//    	dd($name);
        return [
           'name'=>'required'
        ];
    }


	public function messages()
	{
		return [
			'name.required' => 'A name is required',
		];
	}
}
