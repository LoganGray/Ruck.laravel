<?php

class Gtd_Project_Controller extends Base_Controller {

	public function action_project_list()
	{
		$projects = Ruck\Project::all();
		return View::make('gtd.project.list')->with('projects', $projects);
	}
	
	public function action_project_view($id)
	{
		$project = Ruck\Project::find($id);
		$todos = $project->todos;
		return View::make('gtd.project.details')->with('project', $project)->with('todos', $todos);
	}
	
	public function action_project_create()
	{
		return View::make('gtd.project.form');
	}

	public function action_project_edit($id)
	{
		$project = Ruck\Project::find($id);
		return View::make('gtd.project.form')->with('project', $project);
	}

	public function action_project_update()
	{
		$input = Input::get();
		$rules = array(
			'name' => 'required',
		);
		
		$v = Validator::make($input, $rules);
		
		if ($v->fails())
		{
			return Redirect::to('gtd/project/new')->with_input();
		}
		else
		{
			$data = array(
				'name'			=> Input::get('name'),
				'description'	=> Input::get('description'),
			);
			if (Input::get('id'))
			{
				$project = Ruck\Project::find(Input::get('id'));
				$project->fill($data)->save();
			}
			else
			{
				$project = new Ruck\Project();
				$project->fill($data)->save();
			}
			return Redirect::to('gtd/project');
		}
	}

	public function action_project_delete($id)
	{
		$project = Ruck\Project::find($id);
		$project->delete();
		return Redirect::to('gtd/project');
	}
	
	/**
	 * Handles Ajax PUT requests with new ordering for the to-do
	 * items under the relevant project.
	 */
	public function action_update_todo_order()
	{
		$new_order = Input::get('new_order');
		if (isset($new_order))
		{
			// We have a list of re-arranged IDs.
			// What we want to do is retrieve the Todo items, duplicate them,
			// insert them in the new order, then delete the originals.
			foreach ($new_order as $id)
			{
				// TODO: I'm sure there must be a simpler/more efficient way to do this...
				$todo = Ruck\Todo::find($id);
				$data = array(
					'description'	=> $todo->description,
					'notes'			=> $todo->notes,
					'project_id'	=> $todo->project_id,
					'status_id'		=> $todo->status_id,
					'context_id'	=> $todo->context_id,
					'due'			=> $todo->due,
					'created_at'	=> $todo->created_at,
					'updated_at'	=> $todo->updated_at,
				);
				$new_version = new Ruck\Todo();
				$new_version->fill($data)->save();
				$todo->delete();
			}
		}
	}

}
