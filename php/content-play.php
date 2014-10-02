<?php

//separate content page for the play module - as defined in play/index.php

?>

<style>
html,body {
	margin:0;
	padding:0;
	height:100%; /* needed for page min-height */
}

#page{
  max-width: 1140px;
  position:relative; /* needed for footer positioning*/
	margin:0 auto; /* center, not in IE5 */ 
	height:auto !important; /* real browsers */
	height:100%; /* IE6: treated as min-height*/
	min-height:100%; /* real browsers */
}

#page-container {
position: absolute;
left: 0px;
right: 0px;
top: 0px;
bottom: 4px;  
background: #dde url(/img/center-highlight-opacity.png) no-repeat center -400px fixed;
border:1px #ccc solid; 
}

h3 {
margin:0;
margin-top: 3px;
}

ul {
  padding: 0;
}

@media only screen and (min-width: 1200px) {
#page-container {
position: absolute;
left: 0px;
right: 0px;
top: 20px;
bottom: 20px;   }


#vidwrap {

  top:160px;
}

h3 {
position: relative;
top: -38px;
height: 0;
}
}


</style>

<?php 
  
$v = $_GET["v"];
$s = $_GET["s"];

$ip =&getIP();


?>

<div id="main-container">
	<div id="main" class="wrapper clearfix"> 
 
 <?php
$xmlInfoVideo    = simplexml_load_file("http://gdata.youtube.com/feeds/api/videos/".$v."?v=2&fields=title");

foreach($xmlInfoVideo->children() as $title) { $videoTitle = strtoupper((string) $title); }
?>
<h3><?php echo $videoTitle;?> </h3>



			
<div id="controlheader">		
    
  <fieldset class="search"> 
      <form method="post" name="search" action="<?php echo $folder;?>php/db.php">
      <?php focusjs('search','search')?>
        <input <?php focus(search)?>  autocomplete="off" type="text" title="type here" id="<?php echo $big;?>search" class="<?php echo $big;?>search" label="type here" name="v" placeholder="type here..." />
        <input type="hidden" name="db" value="submit">
        <?php focusjs('btn','btn')?>
        <input <?php focus(btn)?> type="submit" id="<?php echo $big;?>btn" class="<?php echo $big;?>btn" value="search" />  
      </form>
  </fieldset>

<ul class="controls">  
  <div class="control-shadow">
    <li>
    <?php focusjs('play','control-link')?>
      <div id="play" class="control-link">
        <a href="#" <?php focus(play)?> > 
          <img src="../img/media_play_pause_resume.png" alt="Pause / Play">
          </br>Pause / Play
        </a>
      </div>
    </li>
  </div>
  
  <div class="control-shadow">
    <li>
    <?php focusjs('repeat','control-link')?>
      <div id="repeat" class="control-link">
       <a href="#" <?php focus(repeat)?> onClick="window.location.reload()">
        <img src="../img/media_repeat.png" alt="Play Again">
        </br>Play Again
        </a>
      </div>
    </li>
  </div> 


<?php 
//get next related video link

relatedyt($v,$s);

$s = str_replace(" ", "+", $s);    
?>

  <div class="control-shadow">
    <li>
    <?php focusjs('back','control-link')?>
      <div id="back" class="control-link">
        <a <?php focus(back)?> href="../<?php echo"$s"; ?>">
          <img src="../img/media_previous.png" alt="Back to choices">
          </br>Back
        </a>
      </div>
    </li>
  </div> 


 <?php 


//custom display for institution require close window button 
if ($ip=="195.194.187.26") {
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
 
 ?>   
  
  
</ul>



 </div>


<!--   <div id=vidwrap>      
 	
    <div id="videoDiv">Loading...</div>

  </div> -->

			
		</div> <!--  #main -->
	</div> <!-- #main-container  -->
  <!-- 
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

    --> 

    
  <input type="button" id="play-button">
 

  <input type="button"  id="pause-button">

<div id="vidwrap" tabindex="-1">

   <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <iframe id="video" tabindex="-1" type="text/html" width="100%" height="100%"
  src="//www.youtube.com/embed/<?php echo $v;?>?enablejsapi=1&html5=1&controls=0&autoplay=1&iv_load_policy=3&showinfo=0&rel=0&modestbranding=1"
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
      'onReady': onPlayerReady
    }
  });
}

function onPlayerReady(event) {
  
  // bind events
  var playButton = document.getElementById("play-button");
  playButton.addEventListener("click", function() {
    player.playVideo();
  });
  
  var pauseButton = document.getElementById("pause-button");
  pauseButton.addEventListener("click", function() {
    player.pauseVideo();
  });
  
}

// Inject YouTube API script
var tag = document.createElement('script');
tag.src = "//www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
</script>

    </div>

