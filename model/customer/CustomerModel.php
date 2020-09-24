<?php

require_once 'utilities/functions.php';
autoloader();

class CustomerModel {

    public function getCustomerById(int $id) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`customers`
                WHERE `customer_id` = :customer_id;
            ");

            $stmt->bindValue(':customer_id', $id, PDO::PARAM_INT);
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

    public function getAllCustomers() {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("SELECT * FROM `bibbrary`.`customers`;");

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

    public function addCustomer(Customer $customer) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("INSERT INTO `bibbrary`.`customers` (`customer_name`, `customer_address`) VALUES (:customer_name, :customer_address);");

            $stmt->bindValue(':customer_name', $customer->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':customer_address', $customer->getAddress(), PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function updateCustomer(Customer $customer) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("UPDATE `bibbrary`.`customers` 
                SET `customer_name` = :customer_name, `customer_address` = :customer_address
                 WHERE (`customer_id` = :customer_id);
            ");

            $stmt->bindValue(':customer_name', $customer->getName(), PDO::PARAM_STR);
            $stmt->bindValue(':customer_address', $customer->getAddress(), PDO::PARAM_STR);
            $stmt->bindValue(':customer_id', $customer->getId(), PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            Database::$pdo->commit();
            return $stmt->rowCount();
        } catch(PDOException $e) {
            bootstrap_alert('Une erreur c\'est produite: ' . $e->getMessage(), 'danger');
            Database::$pdo->rollBack();
        }
    }

    public function deleteCustomer(Customer $customer) {
        try {
            Database::$pdo->beginTransaction();

            $stmt = Database::$pdo->prepare("DELETE FROM `bibbrary`.`customers` WHERE (`customer_id` = :customer_id);");

            $stmt->bindValue(':customer_id', $customer->getId(), PDO::PARAM_INT);
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
