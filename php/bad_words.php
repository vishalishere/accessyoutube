<?php
//check for naughty words via direct url


$query="SELECT * FROM bad_words";

$result = mysql_query($query) or die (mysql_error());



while ($row = mysql_fetch_assoc($result)) {



$bad = $row['word'];



if (preg_match("/\b$bad\b/i", $v)) {header("Location: $folder");}



}

?>




