<?php

// require_once 'utilities/functions.php';
// autoloader();
require_once realpath(dirname(__FILE__) . '/..') . '/utilities/Database.php';

class AuthorController {
	public $authorModel;
	
	public function __construct() {  
		// On ouvre la connection à la base de donnée avant toute autre chose
		Database::init();

		$this->authorModel = new AuthorModel();
	}
	
	public function invoke() {
        $authors = $this->authorModel->getAllAuthors();
		include 'view/author/authors-list.php';
	}
}
