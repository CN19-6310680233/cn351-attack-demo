<?php 
require(__DIR__ . '/db_model.php');

$id = isset($_GET['id']) ? $_GET['id']: false;

$person = get_data($id);

require_once('html/form_update.php');
?>