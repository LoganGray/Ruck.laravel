<?php namespace Ruck;

use Eloquent;

class Context extends Eloquent
{

	public static $timestamps = true;
	
	public function todos()
	{
		return $this->has_many('Ruck\Todo');
	}

}
