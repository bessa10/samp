<?php 

$page_index = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'public/';

header("Location: $page_index");

?>