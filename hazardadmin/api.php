<?php 
 
$host = "localhost";
$username = "root";
$password = "";
$db = "hazard";

$conn = mysqli_connect($host, $username, $password, $db);

if(!$conn){
    die("ERROR in connection: " . mysqli_connect_error());
}
$response = array();

$sql_query = "SELECT * FROM information;";
$result = mysqli_query($conn, $sql_query);

if(mysqli_num_rows($result) > 0){
    $response['success'] = 1;
    $hazard = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // code...
        array_push($hazard, $row);
    }
    $response['hazard'] = $hazard;
}
else{
    $response['success'] = 0;
    $response['message'] = 'No data';
}
echo json_encode($response);
mysqli_close($conn);

?>