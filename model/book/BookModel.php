<?php

require_once 'utilities/functions.php';
autoloader();

class BookModel {

    public function getBookById(int $id) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`books`
                WHERE `book_id` = :id;
            ");

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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

    public function getAllBooks() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`books`;");

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

    public function addBook(Book $book) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("INSERT INTO `bibbrary`.`books` (`book_name`, `book_isbn`, `book_edition`, `author_id`, `publisher_id`) 
                VALUES (:book_name, :book_isbn, :book_edition, :author_id, :publisher_id);"
            );

            $stmt->bindValue(':book_name', $book->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(':book_isbn', $book->getIsbn(), PDO::PARAM_STR);
            $stmt->bindValue(':book_edition', $book->getEdition(), PDO::PARAM_INT);
            $stmt->bindValue(':author_id', $book->getAuthorId(), PDO::PARAM_INT);
            $stmt->bindValue(':publisher_id', $book->getPublisherId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function updateBook(Book $book) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("UPDATE `bibbrary`.`books` 
                SET `book_name` = :book_name, `book_isbn` = :book_isbn, `book_edition` = :book_edition, `author_id` = :author_id, `publisher_id` = :publisher_id 
                WHERE (`book_id` = :book_id);"
            );

            $stmt->bindValue(':book_name', $book->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(':book_isbn', $book->getIsbn(), PDO::PARAM_STR);
            $stmt->bindValue(':book_edition', $book->getEdition(), PDO::PARAM_INT);
            $stmt->bindValue(':author_id', $book->getAuthorId(), PDO::PARAM_INT);
            $stmt->bindValue(':publisher_id', $book->getPublisherId(), PDO::PARAM_INT);
            $stmt->bindValue(':book_id', $book->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function deleteBook(Book $book) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("DELETE FROM `bibbrary`.`books` WHERE (`book_id` = :book_id);");

            $stmt->bindValue(':book_id', $book->getId(), PDO::PARAM_INT);
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
