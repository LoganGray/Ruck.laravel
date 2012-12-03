<?php

class Gtd_Todo_Controller extends Base_Controller {

	public function action_todo_list()
	{
		$todos = Ruck\Todo::all();
		return View::make('gtd.todo.list')->with('todos', $todos);
	}
	
	public function action_todo_view($id)
	{
		$todo = Ruck\Todo::find($id);
		$project = $todo->project;
		return View::make('gtd.todo.details')->with('todo', $todo)->with('project', $project);
	}
	
	public function action_todo_create()
	{
		$projects = Ruck\Project::all();
		return View::make('gtd.todo.create')->with('projects', $projects);
	}

	public function action_todo_insert()
	{
		$input = Input::get();
		$rules = array(
			'description' => 'required',
		);
		
		$v = Validator::make($input, $rules);
		
		if ($v->fails())
		{
			return Redirect::to('gtd/todo/new')->with_input();
		}
		else
		{
			$project = Ruck\Project::find(Input::get('project'));

			$todo = array(
				'description' => Input::get('description'),
				'notes' => Input::get('notes'),
			);
			$project->todos()->insert($todo);
#			$todo = new Ruck\Todo();
#			$todo->description = Input::get('description');
#			$todo->notes = Input::get('notes');
#			$todo->save();

#			$project->todos()->insert($todo);

			return Redirect::to('gtd/todo');
		}
	}

	public function action_todo_edit($id)
	{
		$todo = Ruck\Todo::find($id);
		return View::make('gtd.todo.edit')->with('todo', $todo);
	}

	public function action_todo_delete($id)
	{
		$todo = Ruck\Todo::find($id);
		$todo->delete();
		return Redirect::to('gtd/todo');
	}

}
