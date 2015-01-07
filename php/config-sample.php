<?php

$site_title = 'ACCESS: YouTube';
$site_description ='an accessible interface for users of assistive technologies to play YouTube videos independently';
$google_analytics = 'xxxxx';
$email = 'xxxx';

//get YouTube api from here: https://developers.google.com/youtube/registering_an_application
global $api; $api = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
global $v3api; $v3api = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

//enter 2 char coutry code (GB, NL etc) - needed for filtering out geolocation blocked results
 global $country_code; $country_code = 'GB';


$using_mysql = 'yes';

  $db_host = 'localhost';  
  $db_user = 'xxxxx';  
  $db_password = 'xxxxx';  
  $db_database = 'xxxxx'; 

  $in_root = 'yes'; 

?>