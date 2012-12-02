<?php

class Gtd_Controller extends Base_Controller {

	public function action_index()
	{
		echo "This is the main GTD page.";
	}
	
	public function action_task_list()
	{
		$tasks = DB::table('tasks')->get();
		return View::make('gtd.list')->with('tasks', $tasks);
	}
	
	public function action_task_view($id)
	{
		echo "This is the task view for task #{$id}.";
	}
	
	public function action_task_create()
	{
		echo "This is the new task page.";
	}

	public function action_task_edit($id)
	{
		echo "Editing task #{$id}.";
	}

	public function action_task_delete($id)
	{
		echo "Deleting task #{$id}.";
	}

}
