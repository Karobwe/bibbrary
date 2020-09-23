<?php 

require_once 'utilities/functions.php';
autoloader();

include 'view/header.php';

$controller = new Controller();
$controller->invoke();

include 'view/footer.php';
