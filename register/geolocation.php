<?php
    $url = "http://ip-api.com/json";
    $json = file_get_contents($url);
    $json_data = json_decode($json);
    $lat = $json_data->lat;
    $lon = $json_data->lon;
?>