<?php

class Customer {

  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $name;

  /**
   * @var string
   */
  private $address;

  public function __construct(string $name, string $address, int $id = 0) {
    $this->setName($name);
    $this->setAddress($address);
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

  public function getAddress(): string {
    return $this->address;
  }

  public function setAddress(string $address): void {
    $this->address = $address;
  }

}
