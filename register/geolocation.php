<?php
    $b=$_SERVER['REMOTE_ADDR'];
    $url = "http://ipinfo.io/$b/json";
    $json = file_get_contents($url);
    $json_data = json_decode($json);
    $loc = $json_data->loc;
    $str = explode (",", $loc);
    $lat = $str[0];
    $lon = $str[1];
?>