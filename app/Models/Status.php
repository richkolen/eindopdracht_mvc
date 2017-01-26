<?php

namespace Lara\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'status';

	protected $fillable = ['body'];

	public function user()
	{
		return $this->belongsTo('Lara\Models\User', 'user_id');
	}
}