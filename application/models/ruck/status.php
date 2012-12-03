<?php namespace Ruck;

use Eloquent;

class Status extends Eloquent
{

	public static $table = 'statuses';
	public static $timestamps = true;
	
	public function todos()
	{
		return $this->has_many('Ruck\Todo');
	}
	
}
