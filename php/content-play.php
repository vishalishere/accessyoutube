


<?php 
  
$v = $_GET["v"];
$s = $_GET["s"];
$n = $_GET["n"];
$s = str_replace(" ", "+", $s); 

$next = '../php/next.php?v='.$s;

if (isset($n)){$next .= '&n='.$n;}

$ip =&getIP();

?>
 
 <?php
$xmlInfoVideo    = simplexml_load_file("http://gdata.youtube.com/feeds/api/videos/".$v."?v=2&fields=title");

foreach($xmlInfoVideo->children() as $title) { $videoTitle = strtoupper((string) $title); }
?>


<h3><?php echo $videoTitle;?> </h3>
  
 
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



<script>

$( document ).ready(function() {
 
     $(".controlLink").bind("mouseenter focusin focus", function() {
    $(this).closest(".dropshadow").removeClass("control")
    $(this).closest(".dropshadow").addClass("controlfocus"); 
 });
 
   $(".controlLink").bind("mouseleave focusout blur", function() {
    $(this).closest(".dropshadow").removeClass("controlfocus"); 
    $(this).closest(".dropshadow").addClass("control")
 }); 
 
});




</script>  

<div class="container-fluid hidden-xs">
  <div class="row vid-controls">
<div class="col-xs-2 center-block"></div> 
<div class="col-xs-2 center-block">

<div class="dropshadow lifted control"><a id="play" class="controlLink" href="#" onclick="playPauseToggle()"> 
          <img src="../img/media_play_pause_resume.png" alt="Pause / Play">
          </br><p>Pause / Play</p>
        </a></div> </div>
<div class="col-xs-2 center-block"> <div class="dropshadow lifted control"><a href="#" class="controlLink" onClick="window.location.reload()">
        <img src="../img/media_repeat.png" alt="Play Again">
        </br><p>Play Again</p>
        </a></div> </div>
<div class="col-xs-2 center-block"><div class="dropshadow lifted control">
<a class="controlLink" href="<?php echo"$next"; ?>">
 <img src="../img/media_next.png" alt="Next Video">
          </br><p>Next</p>
        </a>

        <?php 
// relatedyt($v,$s);

 ?></div> </div>
<div class="col-xs-2 center-block"><div class="dropshadow lifted control"><a class="controlLink" href="../<?php echo"$s"; ?>">
          <img src="../img/media_previous.png" alt="Back to choices">
          </br><p>Back</p>
        </a></div> </div>
<div class="col-xs-2 center-block"></div> 
</div>
</div>

  <!-- <div class="control-shadow">
    <li>
    <?php focusjs('volup','control-link')?>
      <div id="volup" class="control-link">
        <a href="#" <?php focus(volup)?> > 
          <img src="../img/volume_up.png" alt="Volume Up">
          </br>Volume Up
        </a>
      </div>
    </li>
  </div> 

    <div class="control-shadow">
    <li>
    <?php focusjs('voldown','control-link')?>
      <div id="voldown" class="control-link">
        <a href="#" <?php focus(voldown)?> > 
          <img src="../img/volume_down.png" alt="Volume Down">
          </br>Volume Down
        </a>
      </div>
    </li>
  </div>  -->



 <?php 


//custom display for institution require close window button 
if ($ip=="195.194.187.26x") {
 //if ($ip=="195.72.35.110") {
?>

  <div class="control-shadow">
   <li>
    <?php focusjs('close','control-link')?>
      <div id="close" class="control-link">
        <a <?php focus(close)?> href="" onclick="closeme();">
          <img src="../img/media_close.png" alt="Close Window">
          </br>Close Window
        </a>
      </div>
    </li>
  </div> 
  
<?php

}
//HTML5 for mobile devices

if ($mobile) {
?>


<div class="vidwrap" tabindex="-1">

   <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <iframe id="video" tabindex="-1" type="text/html" width="100%" height="100%"
  src="//www.youtube.com/embed/<?php echo $v;?>?enablejsapi=1&html5=1&autohide=1&autoplay=1&iv_load_policy=3&showinfo=0&rel=0&modestbranding=1&vq=large"
  frameborder="0"></iframe>

    <script>

// global variable for the player
var player;

// this function gets called when API is ready to use
function onYouTubePlayerAPIReady() {
  // create the global player from the specific iframe (#video)
  player = new YT.Player('video', {
    events: {
      // call this function when player is ready to use
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

function onPlayerReady(event) {

         
    $("#play").click(pauseVideo);

 // $("#volup").click( function(){
 //        if(player){
 //            var currentVol = player.getVolume();
 //            if((currentVol+20) <= 100){
 //                player.setVolume(currentVol+20);
 //                          }
 //        }
 //    });

 //    $("#voldown").click( function(){
 //        if(player){
 //            var currentVol = player.getVolume();
 //            if((currentVol-20) >= 0){
 //                player.setVolume(currentVol-20);
 //            }
 //        }
 //    });
        
}
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {

        $("#play").click(pauseVideo);
          
        }

        else {

            $("#play").click(playVideo);

        }
      }
      

       function pauseVideo() {
        player.pauseVideo();
      }


           function playVideo() {
        player.playVideo();
      }



// Inject YouTube API script
var tag = document.createElement('script');
tag.src = "//www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
</script>

    </div>

<?php

}

//flash method for desktop machines - required to work within the Grid 2 (No way to detect Grid 2 browsing unfortunately)
else { ?>

  <div class="vidwrap" tabindex="-1">      
 	
    <div id="videoDiv">Loading...</div>

  </div>

			
		</div> 
	</div>
  
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">google.load("swfobject", "2.1");</script>    
    <script type="text/javascript">
  
              
     // The "main method" of this sample. Called when someone clicks "Run".
      function loadPlayer() {
        // Lets Flash from another domain call JavaScript
        var params = { allowScriptAccess: "always" };
        // The element id of the Flash embed
        var atts = { id: "ytPlayer" };
        // All of the magic handled by SWFObject (http://code.google.com/p/swfobject/)
        swfobject.embedSWF("http://www.youtube.com/e/<?php echo $v;?>" + 
                           "?showinfo=0&autoplay=1&autohide=1&showsearch=0&rel=1&showsearch=0&enablejsapi=1&playerapiid=player1", 
                           "videoDiv", "100%", "100%", "8", null, null, params, atts);
      }
      function _run() {
        loadPlayer();
      }
      google.setOnLoadCallback(_run);
    </script>

    <?php

  }

  ?>