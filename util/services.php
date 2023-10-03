<?php

$BASIC_URL = "http://localhost:3000/helade/api/v0/";


 function get($url){

     global $BASIC_URL;

//    $api_key = "linkerp";
//    $password = "abc123";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $BASIC_URL.$url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $password);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-type: image/jpeg',
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

}

function post($data,$url){

    global $BASIC_URL;
//    $api_key = "linkerp";
//    $password = "abc123";

    $data_string = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $BASIC_URL.$url );
//curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $password);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Accept: application/json',
            'Content-Type: application/json',
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function put($data,$url){

    global $BASIC_URL;

    $data_string = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $BASIC_URL.$url );
//curl_setopt($ch, CURLOPT_FAILONERROR, true); // Required for HTTP error codes to be reported via our call to curl_error($ch)
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $password);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Accept: application/json',
            'Content-Type: application/json',
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
