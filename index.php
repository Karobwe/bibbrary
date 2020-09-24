<?php 

require_once 'utilities/functions.php';
autoloader();

include 'view/templates/header.php';

$controller = new Controller();
$controller->invoke();

include 'view/templates/footer.php';
