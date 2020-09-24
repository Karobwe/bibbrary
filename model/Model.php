<?php

require_once 'utilities/functions.php';
autoloader();

class Model {
	public function getBookList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"1" => new Book("Être et Temps", "9782070707393", 1, 1, 1),
			"2" => new Book("Finnegans Wake", "9782070402250", 2, 2, 2),
			"3" => new Book("Critique de la raison pure", "9782070325757", 3, 3, 3)
		);
	}
	
	public function getBook($title)
	{
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allBooks = $this->getBookList();
		return $allBooks[$title];
	}
}
