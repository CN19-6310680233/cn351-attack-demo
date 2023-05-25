<?php 
session_start();

if(!isset($_SESSION['user_id'])) {
    header("refresh: 1; url=$BASE_URL");
    return die("You must login to delete");
}

require_once(__DIR__ . '/db_model.php');
$id = isset($_GET['id']) ? $_GET['id']: false;

if(isset($_POST) && isset($_POST['password'])) {
    $user = get_username($_SESSION['user_id']);

    if($user['password'] !== md5($_POST['password'])) {
        return die("Invalid password");
    }

    if (delete_data($id))
        $message = 'Delete Successfully';
    else    
        $message = "Unsuccessfully";
}
require_once('html/message.view.php');

?>