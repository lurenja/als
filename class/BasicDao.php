<?php
include_once 'class/GeneralDao.php';
class BasicDao extends GeneralDao {
	//查询所有书籍类型
	function loadBookType(){
		$result = array();
		try{
			$result = $this->fetch('Basic.loadBookType', array());
		}catch(Exception $e){
			error_log($e);
		}
		return $result;
	}
	//保存书籍类型
	function saveBookType($action, $param){
		$sqlId = 'Basic.'.$action.'BookType';
		try{
			$this->exec($sqlId, $param);
		}catch(Exception $e){
			error_log($e);
		}
	}

	function loadAuthor(){
		$result = array();
		try {
			$result = $this->fetch('Basic.loadAuthor', array());
		} catch (Exception $e) {
			error_log($e);
		}
		return $result;
	}

	function saveAuthor(){
		$sqlId = 'Basic.'.$action.'Author';
		try {
			$this->exec($sqlId, $param);
		} catch (Exception $e) {
			error_log($e);
		}
	}
}
?>