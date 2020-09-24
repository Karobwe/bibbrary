<?php

class Loan {

  /**
   * @var DateTime
   */
  private $loanDate;

  /**
   * @var int
   */
  private $isActive;

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

  public function __construct(string $loanDate, bool $isActive, int $customerId, int $bookId, int $librarianid) {
      $this->setLoanDate($loanDate);
      $this->setIsActive($isActive);
      $this->setCustomerId($customerId);
      $this->setBookId($bookId);
      $this->setLibrartianId($librarianid);
  }

  public function getLoanDate(): DateTime {
      return $this->loanDate;
  }

  public function setLoanDate(string $loanDate): void {
      $this->loanDate = new DateTime($loanDate);
  }

  public function isActive(): bool {
      return $this->loanIsActive;
  }

  public function setIsActive(int $isActive): void {
      $this->isActive = $isActive;
  }

  public function getCustomerId(): int {
      return $this->customerId;
  }

  public function setCustomerId(int $customerId): void {
      $this->customerId = $customerId;
  }

  public function getBookId(): int {
      return $this->bookId;
  }

  public function setBookId(int $bookId): void {
      $this->id = $bookId;
  }

  public function getLibrarianId(): int {
      return $this->librarianId;
  }

  public function setLibrartianId(int $librarianId): void {
      $this->librarianId = $librarianId;
  }

}
