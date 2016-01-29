<?php
include_once 'class/BasicDao.php';
$dao = new BasicDao();
switch ($_POST['oper']) {
	case 'getBookType':
		$list = $dao->getBookType($_POST['id']);
		echo json_encode($list);
		break;
	case 'insertBookType':
		$param = array($_POST['id'], $_POST['name']);
		$dao->saveBookType('insert', $param);
		break;
	case 'updateBookType':
		$param = array($_POST['name'], $_POST['id']);
		$dao->saveBookType('update', $param);
		break;
	case 'deleteBookType':
		$param = array($_POST['id']);
		$dao->saveBookType('delete', $param);
		break;
	case 'getAuthor':
		$list = $dao->getBookType($_POST['id']);
		echo json_encode($list);
		break;
	default:
		error_log('no action defined');
		break;
}
header('Location: setting.php');
?>