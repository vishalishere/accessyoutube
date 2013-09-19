<?php
//end of all files as defined by HTML5 Boilerplate

?>

</div> <!--page-container-->
</div> <!--page-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via build script -->
  <script src="<?php echo $folder;?>js/plugins.js"></script>
  <script src="<?php echo $folder;?>js/script.js"></script>
  <!-- end scripts -->

  <script>
    var _gaq=[['_setAccount','<?php echo $google_analytics; ?>'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>
<?php //ob_end_flush(); ?>  