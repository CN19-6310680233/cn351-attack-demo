<?php
session_start();
require_once(__DIR__ . '/db_model.php');
include(__DIR__ . '/config.php');

// !! (CSRF) Vulnerable code
// ** TODO: Add CSRF Token
if(isset($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(strlen($username) < 4) {
        header("refresh: 1; url=$BASE_URL");
        return die('Username must be more than 4 characters');
    }
    if(strlen($password) < 4) {
        header("refresh: 1; url=$BASE_URL");
        return die('Password must be more than 4 characters');
    }
    
    $login = login($_POST);
    if(!isset($login)) {
        header("refresh: 1; url=$BASE_URL");
        return die("Invalid username or password");
    };
    $_SESSION['user_id'] = $login['id'];
    header("refresh: 2; url=$BASE_URL");
    return die("Successful!");
} else{
    header("refresh: 2; url=$BASE_URL");
    return die("Method is not allow");
}
?>