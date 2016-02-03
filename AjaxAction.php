<?php
include_once 'class/BasicDao.php';
$dao = new BasicDao();
$list = $dao->loadHouse($_POST['key']);
echo json_encode($list);
?>