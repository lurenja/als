<?php
include_once 'class/BookDao.php';
$dao = new BookDao();
$param = array();
array_push($param, $_POST['bName'], $_POST['author'], $_POST['country'], 
	$_POST['age'], $_POST['pubDate'], $_POST['pubHouse'], $_POST['type'], $_POST['bid']);
$dao->saveBook('update', $param);
header('Location: index.php');
?>