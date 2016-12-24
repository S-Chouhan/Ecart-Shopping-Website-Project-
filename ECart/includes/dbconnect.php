<?php
    $dbuser = "vbandava";
    $dbpass = "JDjk9ca7";
    $dbserver = "webdev.dsci.kent.edu";
    $dbname = "vbandava";
$dbconn = @mysql_connect($dbserver,$dbuser,$dbpass) or exit("SERVER Unavailable");
@mysql_select_db($dbname,$dbconn) or exit("DB Unavailable");
?>