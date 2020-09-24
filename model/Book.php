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
    public $title;

    /**
     * @var string
     */
    public $isbn;

    /**
     * @var int
     */
    public $edition;
    
    public function __construct(string $title, string $isbn, $edition, int $authorId, int $publisherId) {
        $this->setId(0);
        $this->setTitle($title);
        $this->setIsbn($isbn);
        $this->setEdition($edition);
        $this->setAuthorId($authorId);
        $this->setPublisherId($publisherId);
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getIsbn(): string {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void {
        $this->isbn = $isbn;
    }

    public function getEdition(): int {
        return $this->edition;
    }

    public function setEdition(int $edition): void {
        $this->edition = $edition;
    }

    public function getAuthorId(): string {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void {
        $this->authorId = $authorId;
    }

    public function getPublisherId(): string {
        return $this->publisherId;
    }

    public function setPublisherId(int $publisherId): void {
        $this->publisherId = $publisherId;
    }
}
