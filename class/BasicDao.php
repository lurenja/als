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
	//查询单个书籍类型信息
	function getBookType($id){
		$result = array();
		try {
			$result = $this->fetch('Basic.getBookType', array($id));
		} catch (Exception $e) {
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
	//查询所有作者
	function loadAuthor(){
		$result = array();
		try {
			$result = $this->fetch('Basic.loadAuthor', array());
		} catch (Exception $e) {
			error_log($e);
		}
		return $result;
	}
    //查询单个作者信息
	function loadAuthor(){
		$result = array();
		try {
			$result = $this->fetch('Basic.loadAuthor', array());
		} catch (Exception $e) {
			error_log($e);
		}
		return $result;
	}
	//保存作者信息
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