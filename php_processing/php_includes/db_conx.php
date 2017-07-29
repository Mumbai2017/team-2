<?php
define('DBHOST', 'localhost'); //111.118.215.222
define('DBUSER', 'stylokzt_alpha');
define('DBPASS', 'sarvaswa');
define('DBNAME', 'stylokzt_chaakri');

$connection= mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if(!$connection)
{
printf("Can't connect to MySQL Server.", mysqli_connect_error());
exit;
}

?>