<?php

class Controller_Home extends Controller_Template
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data = array();
		$this->template->title = 'Home Page';
		$this->template->content = View::forge('home/index', $data);
	}

	public function action_other()
	{
		die('home other');
	}
	

	
}
