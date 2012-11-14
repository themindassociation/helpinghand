<?php
class Controller_Request extends Controller_Template
{

	public function action_index()
	{
		$data['requests'] = Model_Request::find('all');
	
		$this->template->title = "Requests";
		$this->template->content = View::forge('request/index', $data);

	}

	public function action_view($id = null)
	{
		$data['request'] = Model_Request::find($id);

		is_null($id) and Response::redirect('Request');

		$this->template->title = "Request";
		$this->template->content = View::forge('request/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Request::validate('create');
			
			if ($val->run())
			{
				$request = Model_Request::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
				));

				if ($request and $request->save())
				{
					Session::set_flash('success', 'Added request #'.$request->id.'.');

					Response::redirect('request');
				}

				else
				{
					Session::set_flash('error', 'Could not save request.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Requests";
		$this->template->content = View::forge('request/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Request');

		$request = Model_Request::find($id);

		$val = Model_Request::validate('edit');

		if ($val->run())
		{
			$request->title = Input::post('title');
			$request->body = Input::post('body');

			if ($request->save())
			{
				Session::set_flash('success', 'Updated request #' . $id);

				Response::redirect('request');
			}

			else
			{
				Session::set_flash('error', 'Could not update request #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$request->title = $val->validated('title');
				$request->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('request', $request, false);
		}

		$this->template->title = "Requests";
		$this->template->content = View::forge('request/edit');

	}

	public function action_delete($id = null)
	{
		if ($request = Model_Request::find($id))
		{
			$request->delete();

			Session::set_flash('success', 'Deleted request #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete request #'.$id);
		}

		Response::redirect('request');

	}


}
