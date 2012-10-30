<?php

class Controller_Main extends Controller_Template
{

	public function action_index()
	{
		Session::set_flash('success', 'oh yeah!');
		Session::set_flash('error', 'oh noes!');
		$this->template->title = 'TheMind';
		$this->template->content = View::forge('main/index');
	}

}
