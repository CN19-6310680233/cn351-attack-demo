<?php 

require_once(__DIR__ . '/db_model.php');
$message = '';

if (insert_data($_POST))
    $message = 'Insert Successfully';
else    
    $message = "Insert Failure";

require_once('html/message.view.php')
?>