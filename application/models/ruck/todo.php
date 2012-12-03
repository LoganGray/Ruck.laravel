<?php namespace Ruck;

use Eloquent;

class Todo extends Eloquent
{

	public static $timestamps = true;
	
	public function status()
	{
		return $this->has_one('Ruck\Status');
	}
	
	public function context()
	{
		return $this->has_one('Ruck\Context');
	}
	
	public function project()
	{
		return $this->belongs_to('Ruck\Project');
	}
	
}
