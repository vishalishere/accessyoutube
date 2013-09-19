<?php 

//global file used for includes and file location references
//needs some work...

//ref to current page
$page = dirname($_SERVER['PHP_SELF']);


//for absolute php includes
$root = dirname(__FILE__);
$root = str_replace('\\','/',$root);
$root = $root.'/';


//for absolute html includes
$folder = basename(__DIR__);

if ($folder !='__DIR__'){
$folder = '/'.$folder.'/';
}

else {
$folder = '';
}


// better folder detection
$url = $_SERVER['REQUEST_URI'];
$urlParse = parse_url($url);

$path = explode('/',$urlParse ['path']);


if ($path[1] != ''){$inFolder == 'true'; $foldername = '/'.$path[1].'/'; }
elseif ($path[1] == 'php') {$foldername = '/';}
else {$inFolder == 'false'; $foldername = '/';}

# Prevent XSS and SQL Injection
if(strpos($_SERVER['HTTP_HOST'],$_SERVER['SERVER_NAME'])===false){
    header('Content-Type:text/plain');
    header('X-Robots-Tag:none',true);
    header('Status:400 Bad Request',true,400);
    exit('400 Bad Request');
}
  

require_once ($root.'php/config.php');

if ($using_mysql == 'yes'){
	require_once ($root.'php/connect.php');
	}	
	
require_once ($root.'php/functions.php');

        
?>