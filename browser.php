<?php
print”<table border=1>”;
foreach ($_SERVER as $key=>$val ){
if ($key <> “HTTP_COOKIE” && $key <> “PATH”){
echo “<tr><td>”.$key.”</td><td>” .$val.”</tr>”;
}
}
print”</table>”;
?>