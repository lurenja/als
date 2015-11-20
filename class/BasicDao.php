<?php
include_once 'class/GeneralDao.php';
class BasicDao extends GeneralDao {
	function saveBookType($action, $param){
		$sqlId = 'Basic.'.$action.'BookType';
		try{
			$this->exec($sqlId, $param);
		}catch(Exception $e){
			error_log($e);
		}
	}
}
?>