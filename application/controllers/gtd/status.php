<?php

class Gtd_Status_Controller extends Base_Controller {

	public function action_status_list()
	{
		$statuses = Ruck\Status::all();
		return View::make('gtd.status.list')->with('statuses', $statuses);
	}
	
	public function action_status_view($id)
	{
		$status = Ruck\Status::find($id);
		$todos = $status->todos;
		return View::make('gtd.status.details')->with('status', $status)->with('todos', $todos);
	}
	
	public function action_status_create()
	{
		return View::make('gtd.status.form');
	}

	public function action_status_edit($id)
	{
		$status = Ruck\Status::find($id);
		return View::make('gtd.status.form')->with('status', $status);
	}

	public function action_status_update()
	{
		$input = Input::get();
		$rules = array(
			'name' => 'required',
			'type' => 'required',
		);
		
		$v = Validator::make($input, $rules);
		
		if ($v->fails())
		{
			return Redirect::to('gtd/status/new')->with_input();
		}
		else
		{
			$data = array(
				'name'			=> Input::get('name'),
				'description'	=> Input::get('description'),
				'type'			=> Input::get('type'),
			);
			if (Input::get('id'))
			{
				$status = Ruck\Status::find(Input::get('id'));
				$status->fill($data)->save();
			}
			else
			{
				$status = new Ruck\Status();
				$status->fill($data)->save();
			}
			return Redirect::to('gtd/status');
		}
	}

	public function action_status_delete($id)
	{
		$status = Ruck\Status::find($id);
		$status->delete();
		return Redirect::to('gtd/status');
	}

}
