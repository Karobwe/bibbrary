<?php

/**
 * Passe le ou les variables passés en paramètre
 * à la méthode var_dump() de PHP, en entourant 
 * le tout avec les balises HTML <pre></pre>
 * pour avoir un affichage plus lisible
 */
function pre_var_dump(...$args) {
  echo '<pre class="bg-dark text-white p-3">';
  var_dump($args);
  echo '</pre>';
}

/**
 * Affiche un message dans une div possédant les classes alerts de Bootstrap
 * 
 * @param string $message Contenu à afficher
 * @param string $type Type d'alert souhaiter (success, info, warning, danger, etc)
 */
function bootstrap_alert(string $message, string $type = 'info') {
  if(!in_array($type, array('success', 'warning', 'danger', 'light', 'dark', 'info'))) {
    $type = 'info';
  }

  echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
}

/**
 * Recherche une classe dans le dossier "controller" ou "model"
 * et l'enregistre dans la fonction "spl_autoload_register()"
 */
function autoloader() {
  spl_autoload_register(function($class){
    $sources = array(
      "controller/$class.php", 
      "model/$class.php", 
      "model/author/$class.php", 
      "model/book/$class.php", 
      "model/customer/$class.php", 
      "model/librarian/$class.php",
      "model/loan/$class.php",
      "model/publisher/$class.php",
      "utilities/$class.php", 
    );
  
    foreach ($sources as $source) {
      if (file_exists($source)) {
          require_once $source;
      } 
    }
  });
}
