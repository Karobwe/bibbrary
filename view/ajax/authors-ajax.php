<?php

require_once '../../utilities/functions.php';
autoloader();

// require_once '../../model/author/AuthorModel.php';
require_once realpath(dirname(__FILE__) . '/../..') . '/model/author/AuthorModel.php';
// echo file_exists(realpath(dirname(__FILE__) . '/../..') . '/model/author/AuthorModel.php');
// die();

$response = array();
$authorModel = new AuthorModel();

if(isset($_POST['name']) && !empty($_POST['name'])) {
    $author_name = htmlspecialchars($_POST['name']);

    if($authorModel->addAuthor($author_name)) {
        $response['success'] = true;
        $response['message'] = 'Author added';

        echo json_encode($response);
    } else {
        $response['error'] = true;
        $response['message'] = 'Database error';
        echo json_encode($response);
    }

} else if(isset($_POST['list-authors'])) {
    try {
        $authors = $authorModel->getAllAuthors();

        $response['success'] = true;
        $response['authors'] = json_encode($authors);
    } catch(Exception $e) {
        $response['error'] = true;
        $response['message'] = $e->getMessage();

        echo json_encode($response);
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Invalid name';

    echo json_encode($response);
}
