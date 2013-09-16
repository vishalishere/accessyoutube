<?php

//mysql connection - auth setup in config.php

$mysql = mysql_connect($db_host, $db_user, $db_password);  

if (!$mysql) {
    die('Could not connect: ' . mysql_error());
}

$mysql_db = mysql_select_db($db_database);

if (!$mysql_db) {
    die('Could not connect: ' . mysql_error());
}

?>
