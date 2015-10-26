<?php

//all PHP functions in here...

function focusjs($id,$class)         {

  $id = preg_replace("/[^A-Za-z0-9]/", "", $id);
  
  $js  = 		"<script>";
	$js .= 		"function changeClass$id(){";
	$js .= 		"document.getElementById(\"$id\").setAttribute(\"class\", \"".$class."focus\");}";
	$js .= 		"function changeClass1$id(){";
	$js .= 		"document.getElementById(\"$id\").setAttribute(\"class\", \"".$class."\");}";
	$js .= 		"</script>";
  
  echo $js;
	
}

function focus($id){
$id = preg_replace("/[^A-Za-z0-9]/", "", $id);
	echo "
	
	onFocus=\"changeClass$id()\" 
	onBlur=\"changeClass1$id()\"
	onMouseover=\"changeClass$id()\" 
	onMouseout=\"changeClass1$id()\" ";
}


//video search results
function getyt($v) {

global $v3api;
global $country_code;
//string explained: 
  //Country restriction is to stop youtube returning video that aren't allowed to be played due to geographic restrictions
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&regionCode='.$country_code.'&videoSyndicated=any&videoEmbeddable=true&videoDimension=2d&order=relevance&type=video&safeSearch=strict&maxResults=12&key='.$v3api;


$content = file_get_contents($url);
$json = json_decode($content, true);

$n=0;

foreach($json['items'] as $item) {
    $vidId = $item['id']['videoId'];
    $title = $item['snippet']['title'];
    $thumb = $item['snippet']['thumbnails']['high']['url'];


    $link= 'play/?v='.$vidId.'&amp;s='.$v.'&n='.$n;

    $n++;




echo "<div class=\"col-lg-3 col-md-4 col-sm-6 vids\">";

  $a = $n;
  if ($n==10){$a=0;}
  elseif ($n==11){$a=a;}
  elseif ($n==12){$a=b;}

echo '<div class="accesskey"><p>'.$a.'</p></div>';

echo "<div class=\" vidlink drop-shadow lifted\">";



echo "<a id=\"vid".$n."\" class=\"vid\" ";
 
echo	"href=\"{$link}\"><img class=\"img-responsive\" src=\"{$thumb}\" alt=\"{$title}\"";

if ($a<10){echo 'accesskey="'.$a;}

echo "\"/><p>$title</p></a>\n";



 echo '</div></div>';

      }

  }





//function to extract IP  - used for custom display for different institutions


  function &getIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>
