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
		return View::make('gtd.todo.form')->with('projects', $projects);
	}

	public function action_todo_edit($id)
	{
		$todo = Ruck\Todo::find($id);
		$projects = Ruck\Project::all();
		return View::make('gtd.todo.form')->with('todo', $todo)->with('projects', $projects);
	}

	public function action_todo_update()
	{
		$input = Input::get();
		$rules = array(
			'description' => 'required',
		);
		
		$v = Validator::make($input, $rules);
		
		if ($v->fails())
		{
			return Redirect::back()->with_input();
		}
		else
		{
			$data = array(
				'description'	=> Input::get('description'),
				'notes'			=> Input::get('notes'),
			);
			
			if (Input::get('id'))
			{
				$todo = Ruck\Todo::find(Input::get('id'));
				$todo->fill($data)->save();
			}
			else
			{
				$project = Ruck\Project::find(Input::get('project'));
				$project->todos()->insert($data);
			}

			return Redirect::to('gtd/todo');
		}
	}

	public function action_todo_delete($id)
	{
		$todo = Ruck\Todo::find($id);
		$todo->delete();
		return Redirect::back();
	}

}
