<?php
 //数据库交互类
class DBUtil {

	function createPDO(){   //创建PDO对象
		$pdo = new PDO(URL, USER, PASSWORD);
        $pdo->exec('SET names utf8');
        return $pdo;
	}

	function freePDO($obj){ //清空PDO对象
		$obj = null;
	}

	function loadSql($sqlName){ //根据SQL ID获取SQL语句
        $sqlString = '';
        $sqlDir = ROOT_PATH.'/class/sql/';
        $idArray = explode(".", $sqlName); //将SQL Name字符串分割为文件名和SQL ID
        $filePath = $sqlDir.$idArray[0].'.xml';
        if(file_exists($filePath)){ //匹配相应的SQL文件
        	$xml = simplexml_load_file($filePath);   //读取XML内容
        	foreach($xml->sql as $sqlObj){         //循环SQL语句条目
        		if($sqlObj['id'] == $idArray[1]){    //匹配相应的SQL语句条目
        			$sqlString = strval($sqlObj);
        			$sqlString = trim($sqlString); //去除转义字符
        			$sqlString = str_replace("\n",' ',$sqlString);
        			$sqlString = str_replace("\t",' ',$sqlString);
        		}
        	}
        }else{
            error_log($sqlName. ': No File Found!');
        }
        if(empty($sqlString)){
            error_log($sqlName . ': No SQL Found!');
        }
        return $sqlString;
    }
}
?>