<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysRotate extends Model
{
    //
	const ROTATE_IS_SHOW_ON = 1;

	protected $table='sys_rotates';

	public function scopeShow($query)
	{
		return $query->where('is_show',self::ROTATE_IS_SHOW_ON);
	}
}
