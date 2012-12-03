<?php namespace Ruck;

use Eloquent;

class Project extends Eloquent
{

	public static $timestamps = true;
	
	public function parent_project()
	{
		return $this->has_one('Ruck\Project');
	}
	
	public function status()
	{
		return $this->has_one('Ruck\Status');
	}
	
	public function todos()
	{
		return $this->has_many('Ruck\Todo');
	}
	
}
