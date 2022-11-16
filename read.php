<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Method: GET");

include ('connection.php');

$data=json_decode(file_get_contents("php://input"),true);
if (isset($_GET['id']) && $_GET['id']!="") {
$id=$_GET['id'];
$query="SELECT  * FROM 'data' WHERE id={$id}";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0) {
    $output=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    $response['message']="No Records Found";
    echo json_encode($response);
}  
}

else {
    $query="SELECT  * FROM data";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0) {
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        $response['message']="Records Found";
        echo json_encode($response);
    }
    
}
?>
