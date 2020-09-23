<?php

require_once 'config.php';

/**
 * Ouvre une connection vers la base de données en utilisant les informations 
 * contenu dans le fichier config.php
 */
class Database {

  /**
   * @var PDO
   */
  public static $pdo;

  public function __construct() {
    try { 
      $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
      $pdo->exec("SET CHARACTER SET utf8");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      $this::$pdo = $pdo;
    }catch(Exception $e) { 
        bootstrap_alert('Erreur lors de la connexion à la base de données: ' . $e->getMessage(), 'danger'); 
    }
  }

  /**
   * Initialise l'attribut static $pdo
   */
  public static function init(): void {
    $pdo = new Database();
  }
}
