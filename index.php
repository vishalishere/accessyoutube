<?php


$filename = 'php/config.php';

if (!file_exists($filename)) {
    echo "The file $filename doesn't exists - rename php/sample-config.php to php/config.php and add MySql DB and API info.";

    die();
} 

//manually enter link to global.php - everything else is automatic from there

require_once ('global.php');

require_once ($root.'php/begin.php');

require_once ($root.'php/header.php');

require_once ($root.'php/content-main.php');

require_once ($root.'php/footer.php');

require_once ($root.'php/end.php');


?>
