
<?php    

//ALL PAGE CONTENT GOES IN HERE

//change search class prefix to 'big' if front page   
$big = '';
$v = '';
$front = false;
if (!isset($_GET['v'])|| empty($_GET['v'])) {$front = true;}


if ($front){
?>
  
  <div class="container-fluid">
  <div class="row form">
  <form role="form" method="post" name="search" action="<?php echo $folder;?>php/db.php">
  <?php focusjs('bigsearch','bigsearch')?><?php focusjs('bigbtn','bigbtn')?>
  <div class="col-md-1 "></div>
  <div class="col-md-8 col-sm-9"><input class="bigsearch" <?php focus('bigsearch')?> autocomplete="off" type="text" title="type here" id="bigsearch" name="v" placeholder="type here..." /></div>
  <div class="col-md-2 col-sm-3"><input <?php focus('bigbtn')?> type="submit" id="bigbtn" class="bigbtn" value="search" />  </div>
  <div class="col-md-1 "></div>
  </div>
    
      
        
         
        
      </form>

        
      </div>
    
<hr class="front">

<?php

}



if (isset($_GET['v']) && !empty($_GET['v']) && $v!=' ') {  

//rewrite search request
$v = $_GET['v'];
$v = preg_replace('/\s\s+/', ' ', $v);
$v = urlencode($v); 


@include ($root.'php/bad_words.php');




echo '<ul class="vidresults">';
getyt($v);
echo '</ul>';



}


?>                    