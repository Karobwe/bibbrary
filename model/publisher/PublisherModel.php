<?php

require_once 'utilities/functions.php';
autoloader();

class PublisherModel {

    public function getPublisherById(int $id) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`publishers`
                WHERE `publisher_id` = :publisher_id;
            ");

            $stmt->bindValue(':publisher_id', $id, PDO::PARAM_INT);
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

    public function getAllPublishers() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`publishers`;");

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

    public function addPublisher(Publisher $publisher) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("INSERT INTO `bibbrary`.`publishers` (`publisher_name`) VALUES (:publisher_name);");

            $stmt->bindValue(':publisher_name', $publisher->getName(), PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function updatePublisher(Publisher $publisher) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("UPDATE `bibbrary`.`publishers` SET `publisher_name` = :publisher_name WHERE (`publisher_id` = :publisher_id);");

            $stmt->bindValue(':publisher_name', $publisher->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':publisher_id', $publisher->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function deletePublisher(Publisher $publisher) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("DELETE FROM `bibbrary`.`publishers` WHERE (`publisher_id` = :publisher_id);");

            $stmt->bindValue(':publisher_id', $publisher->getId(), PDO::PARAM_INT);
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
