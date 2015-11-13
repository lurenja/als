<?php 
include_once 'DBUtil.php';
include_once dirname(dirname(__FILE__)) . '/config.php';
include_once 'bean/Book.php';
class BookDao{
	private $util;
	function __construct(){
		$this->util = new DBUtil();
	}
	//查询所有书籍
	function loadAll(){
		$result = array();
		$sqlString = $this->util->loadSql('Book.loadAll');

		$pdo = $this->util->createPDO();
		$stmt = $pdo->prepare($sqlString);
		$isDone = $stmt->execute();
		$error = LogUtil::getPDOErr($stmt);
		if(empty($error)){
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Book');
		}else{
			LogUtil::getLog()->info($error);
		}
		$this->util->freePDO($pdo);
		return $result;
	}

	function loadByID($bid){
		$book = new Book();
		$sqlString = $this->util->loadSql('Book.loadByID');

		$pdo = $this->util->createPDO();
		$stmt = $pdo->prepare($sqlString);
		$stmt->bindValue(':bid', $bid);
		$isDone = $stmt->execute();
		$error = LogUtil::getPDOErr($stmt);
		if(empty($error)){
			$book = $stmt->fetchObject('Book');
		}else{
			LogUtil::getLog()->info($error);
		}

		$this->util->freePDO($pdo);
		return $book;
	}

	function loadBookType(){
		$result = array();
		$sqlString = $this->util->loadSql('Basic.loadBookType');

		$pdo = $this->util->createPDO();
		$stmt = $pdo->prepare($sqlString);
		$stmt->execute();
		$error = LogUtil::getPDOErr($stmt);
		if(empty($error)){
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			LogUtil::getLog()->info($error);
		}
		$this->util->freePDO($pdo);
		return $result;
	}

	function saveBook($action, $param){
		$sqlId = 'Book.'.$action.'Book';
		$sqlString = $this->util->loadSql($sqlId);
		
		$pdo = $this->util->createPDO();
		$stmt = $pdo->prepare($sqlString);
		$stmt->execute($param);
		$error = LogUtil::getPDOErr($stmt);
		if(!empty($error)){
			LogUtil::getLog()->info($error);
		}
		$this->util->freePDO($pdo);
	}
}
?>