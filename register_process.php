<?php
session_start();
require_once(__DIR__ . '/db_model.php');
include(__DIR__ . '/config.php');

if(isset($_POST)) {
    $register = register($_POST);
    if ($_POST['password'] !== $_POST['confirm_password']) {
        header("refresh: 1; url=$BASE_URL/register.php");
        return die("Password are not match");
    } else if(!isset($register)) {
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