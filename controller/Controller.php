<?php

require_once 'utilities/functions.php';
autoloader();

class Controller {
	public $model;
	public $dashBoardModel;
	
	public function __construct() {  
		// On ouvre la connection à la base de donnée avant toute autre chose
		Database::init();

		$this->model = new Model();
		$this->dashBoardModel = new DashboardModel();
	}
	
	public function invoke() {
		if (isset($_GET['list'])) {
			// no special book is requested, we'll show a list of all available books
			$books = $this->model->getBookList();
			include 'view/book/booklist.php';
		} else if(isset($_GET['book'])) {
			// show the requested book
			$book = $this->model->getBook($_GET['book']);
			include 'view/book/viewbook.php';
		} else {
			$datas = array(
				'authors' => $this->dashBoardModel->getAuthorsCount(),
				'books'  => $this->dashBoardModel->getBooksCount(),
				'customers'  => $this->dashBoardModel->getCustomersCount(),
				'librarians'  => $this->dashBoardModel->getLibrariansCount(),
				'loans'  => $this->dashBoardModel->getLoansCount(),
				'publishers' => $this->dashBoardModel->getPublishersCount()
			);
			include 'view/ajax/home.php';
		}
	}
}
