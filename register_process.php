<?php
session_start();
require_once(__DIR__ . '/db_model.php');

if(isset($_POST)) {
    $register = register($_POST);
    if ($_POST['password'] !== $_POST['confirm_password']) {
        header("refresh: 1; url=/register.php");
        return die("Password are not match");
    } else if(!isset($register)) {
        header("refresh: 1; url=/register.php");
        return die("Cannot register");
    };
    header("refresh: 2; url=/");
    return die("Successful!");
} else{
    header("refresh: 2; url=/register.php");
    return die("Method is not allow");
}
?>