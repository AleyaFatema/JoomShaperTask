<?php

function response(int $status, array $data) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit(0);
}
    
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
    print_r(response(405, ['Not allowed']));
}

if(!isset($_POST['p'])) {
    print_r(response(405, ['Not allowed']));
}

// include the class file
include "Gallery.php";

// allowed task list
$taskList = array('ls', 'up', 'vu', 'fl');

// get the parameter
$task = $_POST['p'];


	// Check if allowed task 
if(!in_array($_POST['p'], $taskList)) {
    print_r(response(405, ['Not allowed']));
}

// Gallery class
$gallery = new Gallery();


// Call class method depeding on the task requested for
// for showing image gallery
if($_POST['p'] == 'ls') {
    $list = response(200, $gallery->listImages());
    print_r($list);
    exit(0);
}

// for upload file
if($_POST['p'] == 'up' && isset($_FILES) && !empty($_FILES)) {
    $uploaded = $gallery->uploadImage($_FILES);
    if(!empty($uploaded)) {
        print_r(response(200, $uploaded));
    }
    else {
        print_r(response(200, ["Image uploaded"]));
    }
}
    
// for individual image show
if($_POST['p'] == 'vu' && isset($_POST['img_id']) && is_numeric($_POST['img_id'])){
    $img = $gallery->getImageById($_POST['img_id']);
    if(!empty($img)) {
        print_r(response(200, [$img]));
    }
    print_r(response(200, ["Image not found"]));
}
if($_POST['p'] == 'fl' && isset($_POST['fl_name'])){
    //$img = $gallery->saveFilteredImage($_POST]);
    print_r(response(200, ["uploaded"]));
}
?>