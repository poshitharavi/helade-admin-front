<?php
session_start();
include_once('../util/services.php');


/**
 *
 */


$postData = json_decode(file_get_contents('php://input'), true);

$data = json_decode(get("addvertistment/get-all-unapproved"), true);
//echo json_encode($data);

if (array_key_exists('error', $data)) {

    echo json_encode(array('status' => 2, 'message' => $data['error']));
} else {

    $output = array();
    foreach ($data as $eData) {
        $rowData = array($eData['addId'], $eData['userName'], $eData['categoryName'], $eData['productName'], $eData['discription'], $eData['price'], $eData['district'], $eData['city'], $eData['image1']);
        array_push($output, $rowData);
    }
    echo json_encode(array('status' => 1, 'data' => $output, 'd' => $data));
}






