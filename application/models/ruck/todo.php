<?php namespace Ruck;

use Eloquent;

class Todo extends Eloquent
{

	public static $timestamps = true;
	
	public $includes = array('context');
	
	public function status()
	{
		return $this->belongs_to('Ruck\Status');
	}
	
	public function context()
	{
		return $this->belongs_to('Ruck\Context');
	}
	
	public function project()
	{
		return $this->belongs_to('Ruck\Project');
	}
	
}
