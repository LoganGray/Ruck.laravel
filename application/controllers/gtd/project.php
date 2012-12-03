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
		return View::make('gtd.project.create');
	}

	public function action_project_insert()
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
			$project = new Ruck\Project();
			$project->name = Input::get('name');
			$project->description = Input::get('description');
			$project->save();
			return Redirect::to('gtd/project');
		}
	}

	public function action_project_edit($id)
	{
		$project = Ruck\Project::find($id);
		return View::make('gtd.project.edit')->with('project', $project);
	}

	public function action_project_delete($id)
	{
		$project = Ruck\Project::find($id);
		$project->delete();
		return Redirect::to('gtd/project');
	}

}
