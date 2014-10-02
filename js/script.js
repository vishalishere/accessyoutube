//all javascript belongs in here

// Update a particular HTML element with a new value
      function updateHTML(elmId, value) {
        document.getElementById(elmId).innerHTML = value;
      }

 function playPauseToggle(){
  var pp = ytplayer.getPlayerState();
  if (pp == 1){
    ytplayer.pauseVideo();
  } else {
    ytplayer.playVideo();
  }
};
    
 

      // This function is automatically called by the player once it loads
      function onYouTubePlayerReady(playerId) {
        ytplayer = document.getElementById("ytPlayer");
        // This causes the updatePlayerInfo function to be called every 250ms to
        // get fresh data from the player
        setInterval(updatePlayerInfo, 250);
        updatePlayerInfo();
        ytplayer.addEventListener("onStateChange", "onPlayerStateChange");
        ytplayer.addEventListener("onError", "onPlayerError");
      }
      
 

        function closeme() {
            window.open('', '_self', '');
            window.close();

        }


//<![CDATA[ 
$(window).load(function(){
$(function(){

        var yt_int, yt_players={},
            initYT = function() {
                $(".ytplayer").each(function() {
                    yt_players[this.id] = new YT.Player(this.id);
                });
            };

        $.getScript("//www.youtube.com/player_api", function() {
            yt_int = setInterval(function(){
                if(typeof YT === "object"){
                    initYT();
                    clearInterval(yt_int);
                }
            },500);
        });

        $('#play').on('click', function(){
          yt_players['player1'].playVideo();
        });

        $('#pause').on('click', function(){
          yt_players['player1'].pauseVideo();
        });

        

      });
});//]]>  



