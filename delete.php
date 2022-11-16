<?php 
header('Content-Type:application/json');
header('Access-Control-Allow-Method:DELETE');

include ('connection.php');

$data=json_decode(file_get_contents("php://input"),true);
$id=$data['id'];

$query="DELETE FROM data WHERE id={$id}";
if (mysqli_query($conn,$query)) {
    
    $response['message']="Deleted Successfully";
    echo json_encode($response);
} else {
    $response['message']="Data Not Deleted";
    echo json_encode($response);
}

?>