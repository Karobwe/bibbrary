<?php

class Librarian {

  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $name;

  public function __construct(string $name, int $id = 0) {
    $this->setName($name);
    $this->setId($id);
  }

  public function getId(): int {
    return $this->id;
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }

}
