<?php

include ('vendor/autoload.php');
$hostname = '';
$dbUser= '';
$dbPassword = '';
$dbName = 'pharmeasy';
$db = new MysqliDb ($hostname, $dbUser, $dbPassword, $dbName);
