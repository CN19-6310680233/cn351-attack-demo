<?php 

require_once(__DIR__ . '/db_model.php');
$id = isset($_GET['id']) ? $_GET['id']: false;

if (delete_data($id))
    $message = 'Delete Successfully';
else    
    $message = "Unsuccessfully";
require_once('html/message.view.php');

?>