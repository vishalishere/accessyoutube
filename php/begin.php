<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

 <head>
<meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $site_title; ?></title>

  
  <meta name="description" content="<?php echo $site_description; ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> 
   <!--  <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" /> -->
    <meta name="apple-mobile-web-app-status-bar-style" content="white" />


  <!-- <link rel="stylesheet" href="<?php echo $folder;?>css/css.php"> -->
  <link rel="stylesheet" href="<?php echo $folder;?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo $folder;?>css/css.css">
  

 
  <!-- Load up some favicons -->
  <link rel="icon" href="/favicon.ico?nocache" type="image/x-icon" />

  <link rel="shortcut icon" href="/favicon.ico?nocache" type="image/x-icon" />
  <link rel="apple-touch-icon" href="apple-touch-icon.png?nocache">

   
  <!-- adaptive images -->
  <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>

  <!-- <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script> -->
  
  <script src="<?php echo $folder;?>js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via build script -->
  <script src="<?php echo $folder;?>js/plugins.js"></script>
  <script src="<?php echo $folder;?>js/script.js"></script>
  <!-- end scripts -->
<?php if($play) { ?>
<style>

.page { 

  position: relative;
  margin:0 auto; /* center, not in IE5 */ 
  height:auto !important; /* real browsers */
  height:100%; /* IE6: treated as min-height*/
  min-height:100%; /* real browsers */
  max-height:100%; /* real browsers */
  overflow: hidden;}

.main-body{
position: absolute;
top: 0px;
bottom: 0px;
left: 0px;
right: 0px;

}


</style>

<?php } ?>

</head>
<body <?php if (!$mobile){ echo'OnLoad="document.search.v.focus();"';}?>>
<div class="page">
<div class="container main-body">