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



