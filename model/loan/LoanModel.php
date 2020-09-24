<?php

require_once 'utilities/functions.php';
autoloader();

class LoanModel {

    public function getLoansByCustomer(Customer $customer) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`loans` WHERE `customer_id` = :customer_id ORDER BY `loan_date` DESC;;
            ");

            $stmt->bindValue(':customer_id', $customer->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $result;
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getLoansByBook(Book $book) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`loans` WHERE `book_id` = :book_id ORDER BY `loan_date` DESC;;
            ");

            $stmt->bindValue(':book_id', $book->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $result;
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getLoansByPublisher(Publisher $publisher) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`loans` WHERE `publisher_id` = :publisher_id ORDER BY `loan_date` DESC;;
            ");

            $stmt->bindValue(':publisher_id', $publisher->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $result;
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getAllLoans() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`loans`;");

            $stmt->execute();
            $result = $stmt->fetchAll();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $result;
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function addLoan(Loan $loan) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("INSERT INTO `bibbrary`.`loans` (`customer_id`, `book_id`, `librarian_id`) VALUES (:customer_id, :book_id, :librarian_id);");

            $stmt->bindValue(':customer_id', $loan->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindValue(':book_id', $loan->getBookId(), PDO::PARAM_INT);
            $stmt->bindValue(':librarian_id', $loan->getLibrarianId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function updateLoan(Loan $loan) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("UPDATE `bibbrary`.`loans` 
                SET `loan_date` = :loan_date, `loan_is_active` = :loan_is_active, `customer_id` = :customer_id, `book_id` = :book_id, `librarian_id` = :librarian_id 
                WHERE (`loan_id` = :loan_id);
            ");

            $stmt->bindValue(':loan_date', $loan->getLoanDate()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $stmt->bindValue(':loan_is_active', $loan->isActive(), PDO::PARAM_INT);
            $stmt->bindValue(':customer_id', $loan->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindValue(':book_id', $loan->getBookId(), PDO::PARAM_INT);
            $stmt->bindValue(':librarian_id', $loan->getLibrarianId(), PDO::PARAM_INT);
            $stmt->bindValue(':loan_id', $loan->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function deletePublisher(Loan $loan) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("DELETE FROM `bibbrary`.`loans` WHERE (`loan_id` = :loan_id);");

            $stmt->bindValue(':loan_id', $loan->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

}
