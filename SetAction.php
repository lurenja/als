<?php
include_once 'class/BasicDao.php';
$dao = new BasicDao();
switch ($_POST['oper']) {
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
	case 'insertAuthor':
		$time = gettimeofday();
		$id = $time['sec'].$time['usec'];
		$param = array($id, $_POST['name'], $_POST['country'], $_POST['age']);
		$dao->saveAuthor('insert', $param);
		break;
	case 'updateAuthor':
		$param = array($_POST['name'], $_POST['country'], $_POST['age'], $_POST['aid']);
		$dao->saveAuthor('update', $param);
		break;
	case 'deleteAuthor':
		$param = array($_POST['aid']);
		$dao->saveAuthor('delete', $param);
		break;
	case 'insertAuthor':
		$time = gettimeofday();
		$id = $time['sec'].$time['usec'];
		$param = array($id, $_POST['name'], $_POST['country'], $_POST['age']);
		$dao->saveAuthor('insert', $param);
		break;
	default:
		error_log('No action defined!');
		break;
}
header('Location: setting.php');
?>