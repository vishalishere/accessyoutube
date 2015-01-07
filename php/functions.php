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
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$v.'&maxResults=12&order=relevance&safeSearch=strict&type=video&videoDimension=2d&regionCode='.$country_code.'&videoEmbeddable=true&videoSyndicated=true&key='.$v3api;

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

if ($n<=10){ $a=$n; 
  if ($n==10){$a=0;}
echo '<div class="accesskey"><p>'.$a.'</p></div>';}

echo "<div class=\" vidlink drop-shadow lifted\">";



echo "<a id=\"vid\" ";
 
echo	"href=\"{$link}\"><img class=\"img-responsive\" src=\"{$thumb}\" alt=\"{$title}\"";

if ($a<10){echo 'accesskey="'.$a;}

echo "\"/><p>$title</p></a>\n";



 echo '</div></div>';

      }

  }

//for next video button on play page
function relatedyt($v,$s)  {

global $api;

global $country_code;

 // generate feed URL
$feedURL = 
"http://gdata.youtube.com/feeds/api/videos/{$v}/related?v=2&max-results=1&format=5&restriction=".$country_code."&safesearch=strict&key=".$api;

// read feed into SimpleXML object

$sxml = @simplexml_load_file($feedURL);

if( empty($sxml))
   {
			echo "Youtube is not returning results at the moment - please try again later";
     return false;
   }      
     
// iterate over entries in resultset
// print each entry's details
      foreach ($sxml->entry as $entry) {
        // get nodes in media: namespace for media information
        $media = $entry->children('http://search.yahoo.com/mrss/');
        
        // get video player URL
        $attrs = $media->group->player->attributes();
        $watch = $attrs['url']; 
        
				//sort url out
				
				$watch = str_replace("&feature=youtube_gdata_player", "", $watch);
				$watch = str_replace("http://", "../play?v=http://", $watch);
				$watch = str_replace("http://www.youtube.com/watch?v=", "", $watch);
	
			
        // get video thumbnail
        $attrs = $media->group->thumbnail[0]->attributes();
        $thumbnail = $attrs['url']; 
        
                // get video ID
        $arr = explode('/',$entry->id);
        $id = $arr[count($arr)-1];
             
        // print record
        
      echo "
        <a class=\"controlLink\" href=\"{$watch}&s={$s}\">
          <img src=\"../img/media_next.png\" alt=\"Next Video: {$media->group->title}\">
          <br><p>Next Video</p>
        </a>"; 
				 
      }
      
      }


//used to get related images for 'most popular' links
 function getimg($v) {

global $api;

global $country_code;

$feedURL = 
"http://gdata.youtube.com/feeds/api/videos?vq={$v}&max-results=1&format=5&orderby=relevance&restriction=".$country_code."&safesearch=strict&key=".$api;
  
// read feed into SimpleXML object
			
$sxml = simplexml_load_file($feedURL);   
    

if( empty($sxml))
   {
			echo "Youtube is not returning results at the moment - please try again later";
     return false;
   }

// iterate over entries in resultset
// print each entry's details
      foreach ($sxml->entry as $entry) {
        // get nodes in media: namespace for media information
        $media = $entry->children('http://search.yahoo.com/mrss/');
        
       
	
			
        // get video thumbnail
        $attrs = $media->group->thumbnail[0]->attributes();
        $thumbnail = $attrs['url']; 
        
             
        // print record


echo	"<img src=\"$thumbnail\" alt=\"$v\"/>";

	
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