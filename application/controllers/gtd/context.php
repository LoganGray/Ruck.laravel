<?php

class Gtd_Context_Controller extends Base_Controller {

	public function action_context_list()
	{
		$contexts = Ruck\Context::all();
		return View::make('gtd.context.list')->with('contexts', $contexts);
	}
	
	public function action_context_view($id)
	{
		$context = Ruck\Context::find($id);
		$projects = Ruck\Project::all();
		$todos = array();
		foreach ($projects as $project)
		{
			$todos = array_merge($todos, Ruck\Todo::where('project_id', '=', $project->id)->where('context_id', '=', $id)->take(1)->get());
		}
		return View::make('gtd.context.details')->with('context', $context)->with('todos', $todos);
	}
	
	public function action_context_create()
	{
		return View::make('gtd.context.form');
	}

	public function action_context_edit($id)
	{
		$context = Ruck\Context::find($id);
		return View::make('gtd.context.form')->with('context', $context);
	}

	public function action_context_update()
	{
		$input = Input::get();
		$rules = array(
			'name' => 'required',
		);
		
		$v = Validator::make($input, $rules);
		
		if ($v->fails())
		{
			return Redirect::to('gtd/context/new')->with_input();
		}
		else
		{
			$data = array(
				'name'			=> Input::get('name'),
				'description'	=> Input::get('description'),
			);
			if (Input::get('id'))
			{
				$context = Ruck\Context::find(Input::get('id'));
				$context->fill($data)->save();
			}
			else
			{
				$context = new Ruck\Context();
				$context->fill($data)->save();
			}
			return Redirect::to('gtd/context');
		}
	}

	public function action_context_delete($id)
	{
		$context = Ruck\Context::find($id);
		$context->delete();
		return Redirect::to('gtd/context');
	}

}
