<?php
DEFINE('DB_USER','3175188_onlineshopdb');
DEFINE('DB_PASSWORD','cuongnga1');
DEFINE('DB_HOST','fdb25.runhosting.com');
DEFINE('DB_NAME','3175188_onlineshopdb');
DEFINE('DB_PORT','3306');

$conn = new mysqli( DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);
//set the encoding ..optional but recommend
$conn->set_charset("utf8");


?>