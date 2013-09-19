<!doctype html>
<?php 

//top of every page adapted from HTML5 Boilerplate. This probably doesn't need to be a PHP file

//compression if you want it:
//ob_start('ob_gzhandler');

?>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

 <head>
<meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $site_title; ?></title>

  
  <meta name="description" content="<?php echo $site_description; ?>">

  <meta name="viewport" content="width=device-width">


  <link rel="stylesheet" href="<?php echo $folder;?>css/css.php">
  
  
  <!-- Load up some favicons -->
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="apple-touch-icon" href="apple-touch-icon-precomposed.png">
  <link rel="apple-touch-icon" href="apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" href="apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" href="apple-touch-icon-114x114-precomposed.png">
  
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
  
  <!-- adaptive images -->
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>

  <!-- <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script> -->
  
  <script src="<?php echo $folder;?>js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>






</head>
<body OnLoad="document.search.v.focus();">
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<div id="page" class="clearfix">
<div id="page-container">