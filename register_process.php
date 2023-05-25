<?php
session_start();
require_once(__DIR__ . '/db_model.php');
include(__DIR__ . '/config.php');

if(isset($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(strlen($username) < 4) {
        header("refresh: 1; url=$BASE_URL/register.php");
        return die('Username must be more than 4 characters');
    }
    if(strlen($password) < 4) {
        header("refresh: 1; url=$BASE_URL/register.php");
        return die('Password must be more than 4 characters');
    }

    $exist = is_username_exist($username);
    if($exist) {
        header("refresh: 1; url=$BASE_URL/register.php");
        return die('Username is already exist');
    }

    if ($password !== $confirm_password) {
        header("refresh: 1; url=$BASE_URL/register.php");
        return die("Password are not match");
    }
    
    $register = register($_POST);
    if(!isset($register)) {
        header("refresh: 1; url=$BASE_URL/register.php");
        return die("Cannot register");
    };
    header("refresh: 2; url=$BASE_URL");
    return die("Successful!");
} else{
    header("refresh: 2; url=$BASE_URL/register.php");
    return die("Method is not allow");
}
?>