<?php
echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";


 print"<table border=0>";
    foreach ($_SERVER as $key=>$val )
       {
         echo "<tr><td>".$key."</td><td>" .$val."</tr>";
        }
    print"</table>";
?>