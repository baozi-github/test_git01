<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/2
 * Time: 13:14
 */
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StatusScope implements Scope
{


	public function apply(Builder $builder, Model $model)
	{
		// TODO: Implement apply() method.
		return $builder->where('is_enable',1);
	}
}