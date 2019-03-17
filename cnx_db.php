<?php

define('DSN','mysql:host=localhost;dbname=Blog');
define('USER','root');
define('PASSWORD','0000');
define('CHARSET','charset=utf-8');

function ConnectDB()
{
    $DataBase = new PDO(DSN,USER,PASSWORD);
    $DataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $DataBase;
}
?>