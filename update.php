<?php 
header('Content-Type:application/json');
header('Access-Control-Allow-Method:POST');

include ('connection.php');
$data=json_decode(file_get_contents("php://input"),true);

$id=$data['id'];
$name=$data['name'];
$quantity=$data['quantity'];
$price=$data['price'];
$category=$data['category'];

$query="UPDATE data SET name='{$name}', quantity='{$quantity}',price='{$price}',category='{$category}' WHERE id={$id}";


if (mysqli_query($conn, $query)) {
    $response['message']="Updated Successfully";
    echo json_encode($response);

} else {
    $response['message']="Not Updated";
    echo json_encode($response);
}

?>