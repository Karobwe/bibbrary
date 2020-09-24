<?php

require_once 'utilities/functions.php';
autoloader();

class Book {

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $isbn;

	/**
	 * @var string
	 */
	private $author;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $coverImageUrl;
	
	public function __construct(string $title, string $author, string $isbn, string $description, int $id = 0, string $coverImageUrl = '') {
    $this->setTitle($title);
		$this->setAuthor($author);
		$this->setIsbn($isbn);
		$this->setDescription($description);
		$this->setId($id);
		$this->setCoverImageUrl($coverImageUrl);
	}

	public function getId(): int {
		return $this->id;
	}

	public function setId(int $id): void {
		if($id > 0) {
			$this->id = $id;
		}

		if(is_null($id) || $id === 0) {
			$this->id = 0;
		}
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title): void {
		if(!empty($title)) {
			$this->title = $title;
		}
	}

	public function getAuthor(): string {
		return $this->author;
	}

	public function setAuthor(string $author): void {
		$this->author = $author;
	}

	public function getIsbn(): string {
		return $this->isbn;
	}

	public function setIsbn(string $isbn): void {
		$this->isbn = $isbn;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function setDescription(string $description): void {
		$this->description = $description;
	}

	public function getCoverImageUrl(): string {
		return $this->coverImageUrl;
	}

	public function setCoverImageUrl(string $coverImageUrl): void {
		if(!empty($coverImageUrl)) {
			$img = getimagesize($coverImageUrl);
			$image_type = $img[2];
			if($img) {
				if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG))) {
					$this->coverImageUrl = $coverImageUrl;
				}
			}
		}
	}

}
