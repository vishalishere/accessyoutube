	
  <div id="main-container">
		<div id="main" class="wrapper clearfix">
			

<?php    

//ALL PAGE CONTENT GOES IN HERE

     
//change search class prefix to 'big' if front page   
$big = '';
if (!isset($_GET['v'])|| empty($_GET['v'])) { $big = 'big';}

?>
 

  <fieldset class="<?php echo $big;?>search"> 
      <form method="post" name="search" action="<?php echo $foldername;?>php/db.php">
      <?php focusjs($big.'search',$big.'search')?>
        <input <?php focus($big.search)?> autocomplete="off" type="text" title="type here" id="<?php echo $big;?>search" class="<?php echo $big;?>search" name="v" placeholder="type here..." />
        <?php focusjs($big.'btn',$big.'btn')?>
        <input <?php focus($big.btn)?> type="submit" id="<?php echo $big;?>btn" class="<?php echo $big;?>btn" value="search" />  
      </form>
  </fieldset>
    
<?php 


//if front page (we use the $big variable from ealier as our indicator)
if ($big == 'big') {

$query = "

SELECT term
FROM search_count
GROUP BY term
ORDER BY COUNT(*) DESC
LIMIT 5

";
//$result = mysql_query($query) or die (mysql_error());
//echo '<h2>Most popular searches:</h2>';

//echo '<ul class="mostpop">';

//while ($row = mysql_fetch_assoc($result)) {
//	$mostpop = $row['term'];
//  $id = str_replace(' ','',$mostpop);
 // $id = preg_replace("/[^A-Za-z0-9]/", "", $id);


	//focusjs($id,'pop') ;
	//echo "<div class=\"smallshadow\"><li id=\"$id\" class=\"pop\"><div><a"; 
	  
 // focus($id);
//  $mostpop_url = str_replace(' ','+',$mostpop);
//  $mostpop_url = strtolower($mostpop_url);
//	echo "href=\"/$mostpop_url\">";
  //getimg($mostpop);
//  echo "<br>$mostpop</a></div></li></div>";
echo '</br>';  
echo '</br>';    
 //} 

//delete all records over 10 days old - keeps the most popular fresh!
$query = "
DELETE FROM search_count 
WHERE date < DATE_SUB(NOW(), INTERVAL 10 DAY)
";

mysql_query($query) or die (mysql_error());


   
}



if (isset($_GET['v']) && !empty($_GET['v']) && $v!=' ') {  

//rewrite search request
$v = $_GET['v'];
$v = preg_replace('/\s\s+/', ' ', $v);
$v = urlencode($v); 

echo '<ul class="vidresults">';
getyt($v);
echo '</ul>';



}


?>                    


			
		</div> <!-- #main -->
	</div> <!-- #main-container -->
