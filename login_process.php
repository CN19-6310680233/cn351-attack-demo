<?php
session_start();
require_once(__DIR__ . '/db_model.php');

if(isset($_POST)) {
    $login = login($_POST);
    if(!isset($login)) {
        header("refresh: 1; url=/");
        return die("Invalid username or password");
    };
    $_SESSION['user_id'] = $login['id'];
    header("refresh: 2; url=/");
    return die("Successful!");
} else{
    header("refresh: 2; url=/");
    return die("Method is not allow");
}
?>