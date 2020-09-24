<?php

require_once 'utilities/functions.php';
autoloader();

class LibrarianModel {

    public function getLibrarianById(int $id) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`librarians`
                WHERE `librarian_id` = :librarian_id;
            ");

            $stmt->bindValue(':librarian_id', $id, PDO::PARAM_INT);
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

    public function getAllLibrarians() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`librarians`;");

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

    public function addLibrarian(Librarian $librarian) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("INSERT INTO `bibbrary`.`librarians` (`librarian_name`) VALUES (:librarian_name);");

            $stmt->bindValue(':librarian_name', $librarian->getName(), PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function updateLibrarian(Librarian $librarian) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("UPDATE `bibbrary`.`librarians` SET `librarian_name` = :librarian_name WHERE (`librarian_id` = :librarian_id);");

            $stmt->bindValue(':librarian_name', $librarian->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':librarian_id', $librarian->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function deleteLibrarian(Librarian $librarian) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("DELETE FROM `bibbrary`.`librarians` WHERE (`librarian_id` = :librarian_id);");

            $stmt->bindValue(':librarian_id', $librarian->getId(), PDO::PARAM_INT);
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
