<?php

require_once 'utilities/functions.php';
autoloader();

include 'view/templates/header.php';

$authorController = new AuthorController();
$authorController->invoke();

include 'view/templates/footer.php';