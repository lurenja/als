<?php 
include_once 'GeneralDao.php';
include_once 'bean/Book.php';
class BookDao extends GeneralDao{

	//查询所有书籍
	function loadAll(){
		$result = array();
		try{
			$result = $this->fetchClass('Book.loadAll', array(), 'Book');
		}catch(Exception $e){
			error_log($e);
		}
		return $result;
	}
	//根据ID查询书籍
	function loadByID($bid){
		$book = new Book();
		try{
			$book = $this->fetchObj('Book.loadByID', array(':bid'=>$bid), 'Book');
		}catch(Exception $e){
			error_log($e);
		}
		return $book;
	}

	//保存书籍
	function saveBook($action, $param){
		$sqlId = 'Book.'.$action.'Book';
		try{
			$this->exec($sqlId, $param);
		}catch(Exception $e){
			error_log($e);
		}
	}
}
?>