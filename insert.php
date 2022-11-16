<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Method: POST");

include ('connection.php');

$data=json_decode(file_get_contents("php://input"),true);
$name=$data['name'];
$quantity=$data['quantity'];
$price=$data['price'];
$category=$data['category'];

$query = "INSERT INTO data(name, quantity, price, category) VALUES ('{$name}','{$quantity}','{$price}','{$category}')";

if (mysqli_query($conn, $query)) {
    $response['message']="Data Inserted Successfully";
    echo json_encode($response);
} else {
    $response['message']="Unsuccessfully! Data Not Inserted";
    echo json_encode($response);
}

?>
