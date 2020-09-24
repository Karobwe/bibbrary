<?php

require_once 'utilities/functions.php';
autoloader();

class DashboardModel {

    public function getAuthorsCount() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT COUNT(*) FROM bibbrary.authors;");
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return intval($result['COUNT(*)']);
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getBooksCount() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT COUNT(*) FROM bibbrary.books;");
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return intval($result['COUNT(*)']);
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getCustomersCount() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT COUNT(*) FROM bibbrary.customers;");
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return intval($result['COUNT(*)']);
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getLibrariansCount() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT COUNT(*) FROM bibbrary.books;");
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return intval($result['COUNT(*)']);
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getLoansCount() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT COUNT(*) FROM bibbrary.books;");
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return intval($result['COUNT(*)']);
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function getPublishersCount() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT COUNT(*) FROM bibbrary.books;");
            $stmt->execute();
            $result = $stmt->fetch();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return intval($result['COUNT(*)']);
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

}
