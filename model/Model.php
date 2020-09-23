<?php

include_once("model/Book.php");

class Model {
	public function getBookList()
	{
		// here goes some hardcoded values to simulate the database
		return array(
			"0" => new Book("Eligendi dolorum id dolorem", "Rocio Mante", "9782893775760", "Officiis sed qui culpa. Ipsum dolorem ipsam voluptas laudantium nostrum eligendi corrupti neque. Necessitatibus autem rerum."),
			"1" => new Book("Moonwalker", "J. Walker", "9782893795727", "Excepturi neque qui vero et. Aut rerum perspiciatis dolor qui quaerat mollitia cumque eveniet."),
			"2" => new Book("PHP for Dummies", "Some Smart Guy", "9762393775782", "Est dolor qui voluptas minus fugit.")
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
