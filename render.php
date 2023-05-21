<?php
function render($html) {
    $target = "{%block%}";
    $content = file_get_contents('html/base.view.php');
    return str_replace($target, $html, $content);
}
?>