<?php

class ContactController extends BaseController {

	protected $layout = "layouts.main";
	
	public function index() {
		$this->layout->content = View::make('contact.intro');
	}
}