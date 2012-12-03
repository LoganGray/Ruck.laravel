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
	
	public function action_todo_create($project_id)
	{
		return View::make('gtd.todo.form')->with('project_id', $project_id);
	}

	public function action_todo_edit($id)
	{
		return View::make('gtd.todo.form')->with('todo', Ruck\Todo::find($id));
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
				'project_id'	=> Input::get('project'),
				'status_id'		=> Input::get('status'),
				'context_id'	=> Input::get('context'),
			);
			
			if (Input::get('id'))
			{
				$todo = Ruck\Todo::find(Input::get('id'));
				$todo->fill($data)->save();
			}
			else
			{
				$todo = new Todo();
				$todo->fill($data)->save();
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
