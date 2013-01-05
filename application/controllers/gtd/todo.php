<?php

class Gtd_Todo_Controller extends Base_Controller {

	/**
	 * The main page. Lists all Next actions, one from each project.
	 */
	public function action_todo_list()
	{
		$projects = Ruck\Project::all();
		$todos = array();
		foreach ($projects as $project)
		{
			$todos = array_merge($todos, Ruck\Todo::where('project_id', '=', $project->id)->take(1)->get());
		}
		return View::make('gtd.todo.list')->with('todos', $todos);
	}
	
	public function action_todo_view($id)
	{
		$todo = Ruck\Todo::find($id);
		$project = $todo->project;
		return View::make('gtd.todo.details')->with('todo', $todo)->with('project', $project);
	}
	
	public function action_todo_create($project_id = '')
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
				'due'			=> (Input::get('due')) ? new DateTime(Input::get('due')) : NULL,
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
				/**
				 * If a project_id exists, then the task is being added to an existing
				 * project. If not, we also need to create a new project and connect it
				 * to this new task as a single-item project.
				 */
				if (Input::get('project'))
				{
					$todo = new Ruck\Todo();
					$todo->fill($data)->save();
				}
				else
					{
						// Create the new Project.
						$project = new Ruck\Project();
						$project->fill(array(
							'name'			=> Input::get('description'),
							'description'	=> Input::get('notes'),
						))->save();
						// Create the new Todo using the new Project id.
						$todo = new Ruck\Todo();
						$todo->fill($data);
						$project->todos()->insert($todo);
						// Set a project_id to return to.
						$data['project_id'] = $project->id;
					}
			}

			return Redirect::to('gtd/project/' . $data['project_id']);
		}
	}

	public function action_todo_delete($id)
	{
		$todo = Ruck\Todo::find($id);
		$project = $todo->project;
		$todo->delete();
		return Redirect::to('/gtd/project/' . $project->id);
	}

}
