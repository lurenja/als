<?php
include_once 'class/BasicDao.php';
$dao = new BasicDao();
switch ($_POST['oper']) {
	case 'insert':
		$param = array($_POST['id'], $_POST['name']);
		$dao->saveBookType('insert', $param);
		break;
	case 'update':
		$param = array($_POST['name'], $_POST['id']);
		$dao->saveBookType('update', $param);
		break;
	case 'delete':
		$param = array($_POST['id']);
		$dao->saveBookType('delete', $param);
		break;
	default:
		error_log('no action defined');
		break;
}
header('Location: setting.php');
?>