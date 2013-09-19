<?php

//check for naughty words! 

//submit search requests to DB for creating 'most popular searches'

require_once ('../global.php');



//dump searchterm to DB if searched for 



$v = $_POST['v'];



if  ((!empty($v)) && (trim($v) != '')) {





//tidy up and multiple spaces within string

while (strpos($v,'  ') !== false) {$v = str_replace('  ', ' ', $v);}

//if first or last character is a space, remove it

$v= ltrim ($v,' ');  $v= rtrim ($v,' ');



$query="SELECT * FROM bad_words";

$result = mysql_query($query) or die (mysql_error());



while ($row = mysql_fetch_assoc($result)) {



$bad = $row['word'];



if (preg_match("/\b$bad\b/i", $v)) {$clean='no';}



}





if ($clean=='no'){header("Location: $foldername");} 



else {



$query="INSERT INTO search_count (term) VALUES ('$v')";

mysql_query($query) or die ('Error updating database: ' . mysql_error());



//change spaces to pluses for url

$v = str_replace(' ', '+', $v);



header("Location: $foldername$v"); }





}





else  {

header("Location: $foldername");

}





?>