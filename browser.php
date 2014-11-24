<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
  <meta charset="utf-8">
  
  
  <script type="text/javascript">
jQuery(document).ready(function () {
    //using jquery
    var href = jQuery(location).attr('href');
    jQuery('#this_title').html('<strong>' + href + '</strong>');
     
});
</script>
  <title>JS Bin</title>
</head>
<body>
  <div id='this_title'> </div>

</body>
</html>