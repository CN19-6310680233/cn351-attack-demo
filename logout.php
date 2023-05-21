<?php
session_start();
session_destroy();
include(__DIR__ . '/config.php');
header("refresh: 1; url=$BASE_URL");
?>