<?php
include_once 'class/BookDao.php';
$dao = new BookDao();
$param = array();
$serialNo = empty($_POST['serialNo'])?1:$_POST['serialNo'];
array_push($param, $_POST['bid'], $_POST['bName'], $_POST['aid'],
	$_POST['pubDate'], $_POST['pubHouse'], $_POST['type'], $serialNo,
	$_POST['remarks']);
$dao->saveBook('insert', $param);
?>