
<?php    

//ALL PAGE CONTENT GOES IN HERE

//change search class prefix to 'big' if front page   
$big = '';
$v = '';
$front = false;
if (!isset($_GET['v'])|| empty($_GET['v'])) {$front = true;}


if ($front){
?>
  <hr>
  <div class="container-fluid">
  <div class="row form">
  <form role="form" method="post" name="search" action="<?php echo $folder;?>php/db.php">
  <?php focusjs('bigsearch','bigsearch')?><?php focusjs('bigbtn','bigbtn')?>
  <div class="col-md-1 "></div>
  <div class="col-md-8 col-sm-9"><input class="bigsearch" <?php focus('bigsearch')?> autocomplete="off" type="text" title="type here" id="bigsearch" name="v" placeholder="type here..." /></div>
  <div class="col-md-2 col-sm-3"><input <?php focus('bigbtn')?> type="submit" id="bigbtn" class="bigbtn" value="search" />  </div>
  <div class="col-md-1 "></div>
  </form>
  </div>
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


?>
  <hr class="visible-md-block visible-lg-block">


  <div class="container-fluid">
  <div class="row form">
  <form role="form" method="post" name="search" action="<?php echo $folder;?>php/db.php">
  <?php focusjs('search','search')?><?php focusjs('btn','btn')?>
  <div class="col-md-3 col-sm-1"></div>
  <div class="col-md-4 col-sm-8"><input class="search" <?php focus('search')?> autocomplete="off" type="text" title="type here" id="search" name="v" placeholder="type here..." /></div>
  <div class="col-md-2 col-sm-2"><input <?php focus('btn')?> type="submit" id="btn" class="btn" value="search" />  </div>
  <div class="col-md-3 col-sm-1"></div>
  </form>
  </div>
  </div>


 <div class="container-fluid">
  <div class="row">

<?php

 echo '<script>

$( document ).ready(function() {
 
     $(vid).bind("mouseenter focusin focus", function() {
    $(this).parent().removeClass("vidlink")
    $(this).parent().addClass("vidlinkfocus"); 
 });
 
   $(vid).bind("mouseleave focusout blur", function() {
    $(this).parent().removeClass("vidlinkfocus"); 
    $(this).parent().addClass("vidlink")
 }); 
 
});




</script>           ';
getyt($v);



?>



</div></div>

<?php

}


?>                    


        
    </div>