<?php
    $dbuser = "root";
    $dbpass = "root";
    $dbserver = "localhost";
    $dbname = "ecart";
$dbconn = @mysql_connect($dbserver,$dbuser,$dbpass) or exit("SERVER Unavailable");
@mysql_select_db($dbname,$dbconn) or exit("DB Unavailable");
?>