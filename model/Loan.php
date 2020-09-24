<?php

class Loan {

  /**
   * @var int
   */
  private $customerId;

  /**
   * @var int
   */
  private $bookId;

  /**
   * @var int
   */
  private $librarianId;

  /**
   * @var DateTime
   */
  private $loanDate;

  /**
   * @var bool
   */
  private $isActive;

  public function __construct(DateTime $loanDate = new DateTime('NOW'), bool $isActive = true, int $customeriD, int $bookId, int $librarianId) {
    $this->setloanDate($loanDate);
    $this->setIsActive($isActive);
    $this->setCustomerId($customeriD);
    $this->setBookId($bookId);
    $this->setLibrarianId($librarianId);
  }

  public function getLoanDate(): string {
    return $this->loanDate->format('Y-m-d H:i');
  }

  public function setloanDate(DateTime $loanDate = new DateTime('NOW')): void {
    $this->loanDate = $loanDate;
  }

  public function isActive(): bool {
    return $this->isActive;
  }

  public function setIsActive(bool $isActive): void {
    $this->isActive = $isActive;
  }

  public function getCustomerId(): int {
    return $this->customerId;
  }

  public function setCustomerId(int $customerId): void {
    $this->customerId = $customerId;
  }

  public function getBookId(): int {
    return $this->BookId;
  }

  public function setBookId(int $BookId): void {
    $this->BookId = $BookId;
  }

  public function getLibrarianId(): int {
    return $this->librarianId;
  }

  public function setLibrarianId(int $librarianId): void {
    $this->librarianId = $librarianId;
  }

}
