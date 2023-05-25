<?php 
session_start();
require_once(__DIR__ . '/db_model.php');

$sort = isset($_GET['sort']) ? $_GET['sort'] : False;

if (!$sort){
    $sort = 'id';
}

switch ($sort){
    case 'name':
        $sort = 'name'; break;
    case 'phone':
        $sort = 'phone'; break;
    case 'email':
        $sort = 'email'; break;
    default:
        $sort = 'id';
}

$persons = get_all_data($sort);
$session = get_username($_SESSION['user_id']);

include("html/template/top.php");
if (isset($_SESSION['user_id'])) {
    include('html/data.view.php');
} else {
    include('html/login.view.php');
}
include("html/template/bottom.php");

db_close();
?>

 