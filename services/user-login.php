<?php
session_start();
include_once('../util/services.php');

$postData = json_decode(file_get_contents('php://input'), true);

$requestData = array(
    "email" => $postData['email'],
    "password" => $postData['password']
);

//echo json_encode($requestData);
$data = json_decode(post($requestData, "user/auth"), true);
//echo json_encode($data);
if (array_key_exists('error', $data)) {
    session_destroy();
    echo json_encode(array('status' => 2, 'message' => $data['error']));
} else {

    $_SESSION["heladeAdminUserId"] = $data["userId"];
    $_SESSION["heladeAdminShortName"] = $data["shortName"];
    $_SESSION["heladeAdminEmail"] = $data['email'];

    echo json_encode(array('status' => 1, 'message' => 'Login successfully'));

}