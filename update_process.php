<?php 

require_once(__DIR__ . '/db_model.php');
$message = '';

if (update_data($_POST))
    $message = 'Update successful';
else    
    $message = "Update failed";

require_once('html/message.view.php')
?>