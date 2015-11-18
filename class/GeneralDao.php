<?php
include_once dirname(dirname(__FILE__)) . '/config.php';
include_once 'DBUtil.php';
class GeneralDao {
	protected $util;

	function __construct(){
		$this->util = new DBUtil();
	}

	//执行查询SQL并返回pdostatement对象
	protected function query($sqlId, $params){
		$sqlString = $this->util->loadSql($sqlId);

		$pdo = $this->util->createPDO();
		$stmt = $pdo->prepare($sqlString);
		$isDone = $stmt->execute($params);
		$pdoError = $stmt->errorInfo();
		if(empty($pdoError[2])){
			return $stmt;
		}else{
			return 'SQL Error: '.$pdoError[2];
		}
	}
	//多行查询结果以 key,value 返回
	function fetch($sqlId, $params){
		$stmt = $this->query($sqlId, $params);
		if(is_object($stmt)){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			throw new Exception($stmt);
		}
	}
	//多行查询结果以 类对象 返回
	function fetchClass($sqlId, $params, $className){
		$stmt = $this->query($sqlId, $params);
		if(is_object($stmt)){
			return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
		}else{
			return new Exception($stmt);
		}
	}
	//单行结果以 类对象 返回
	function fetchObj($sqlId, $params, $className){
		$stmt = $this->query($sqlId, $params);
		if(is_object($stmt)){
			return $stmt->fetchObject($className);
		}else{
			return new Exception($stmt);
		}
	}
	//执行非查询语句
	function exec($sqlId, $params){
		$sqlString = $this->util->loadSql($sqlId);

		$pdo = $this->util->createPDO();
		$stmt = $pdo->prepare($sqlString);
		$isDone = $stmt->execute($params);
		$pdoError = $stmt->errorInfo();
		if(empty($pdoError[2])){
			return 1;
		}else{
			throw new Exception('SQL Error: '.$pdoError[2]);
			return 0;
		}
	}
}
?>