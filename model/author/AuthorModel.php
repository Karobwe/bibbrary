<?php

require_once 'utilities/functions.php';
autoloader();

class AuthorModel {

    public function getAuthorById(int $id) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`authors`
                WHERE `author_id` = :author_id;
            ");

            $stmt->bindValue(':author_id', $id, PDO::PARAM_INT);
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

    public function getAllAuthors() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`authors`;");

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

    public function addAuthor(string $authorName) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("INSERT INTO `bibbrary`.`authors` (`author_name`) VALUES (:author_name);");

            $stmt->bindValue(':author_name', $authorName, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function updateAuthor(Author $author) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("UPDATE `bibbrary`.`authors` SET `author_name` = :author_name WHERE (`author_id` = :author_id);");

            $stmt->bindValue(':author_name', $author->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':author_id', $author->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function deleteAuthor(Author $author) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("DELETE FROM `bibbrary`.`authors` WHERE (`author_id` = :author_id);");

            $stmt->bindValue(':author_id', $author->getId(), PDO::PARAM_INT);
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
