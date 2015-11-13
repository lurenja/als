<?php
include_once "log4php/Logger.php";
/* 日志工具类 */
class LogUtil
{
    private static $logger;

    /* 获取log变量 */
    static function getLog ()
    {
        if(empty(self::$logger)){
            Logger::configure(ROOT_PATH . '/class/config.xml');
            self::$logger = Logger::getLogger('default');
        }
        return self::$logger; // Start logging
    }
    /* Get error message from pdo statement */
    static function getPDOErr ($pdoStmt)
    {
        $tmpArr = $pdoStmt->errorInfo();
        return $tmpArr[2];
    }
}
?>