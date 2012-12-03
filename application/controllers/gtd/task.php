<?php

class Gtd_Task_Controller extends Base_Controller {

	public function action_task_list()
	{
		$tasks = Ruck\Task::all();
		return View::make('gtd.task.list')->with('tasks', $tasks);
	}
	
	public function action_task_view($id)
	{
		$task = Ruck\Task::find($id);
		return View::make('gtd.task.details')->with('task', $task);
	}
	
	public function action_task_create()
	{
		return View::make('gtd.task.create');
	}

	public function action_task_insert()
	{
		$input = Input::get();
		$rules = array(
			'description' => 'required',
		);
		
		$v = Validator::make($input, $rules);
		
		if ($v->fails())
		{
			return Redirect::to('gtd/task/new')->with_input();
		}
		else
		{
			$task = new Ruck\Task();
			$task->description = Input::get('description');
			$task->notes = Input::get('notes');
			$task->save();
			return Redirect::to('gtd/task');
		}
	}

	public function action_task_edit($id)
	{
		$task = Ruck\Task::find($id);
		return View::make('gtd.task.edit')->with('task', $task);
	}

	public function action_task_delete($id)
	{
		$task = Ruck\Task::find($id);
		$task->delete();
		return Redirect::to('gtd/task');
	}

}
