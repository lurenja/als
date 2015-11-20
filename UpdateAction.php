<?php
include_once 'class/BookDao.php';
$dao = new BookDao();
switch ($_POST['oper']) {
	case 'update':
		$param = array();
		$serialNo = empty($_POST['serialNo'])?1:$_POST['serialNo'];
		array_push($param, $_POST['bName'], $_POST['author'], $_POST['country'], $_POST['age'], 
			$_POST['pubDate'], $_POST['pubHouse'], $_POST['type'], $serialNo, 
			$_POST['remarks'], $_POST['bid']);
		$dao->saveBook('update', $param);
		header('Location: index.php');
		break;
	case 'delete':
		$param = array(':bid'=>$_POST['bid']);
		$dao->saveBook('delete', $param);
		header('Location: index.php');
		break;
	default:
		error_log('no action called');
		break;
}
?>