<?php 
require "./../.env";


// What is an inner join?

header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json; charset=UTF-8"); 
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE"); 
header("Access-Control-Max-Age: 3600"); 
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"); 


$requestType = $_SERVER["REQUEST_METHOD"];

$servername = "localhost:3306";
$username = "root";
$password = getenv("PASSWORD");



if($requestType == "GET") {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->query("select * from cats");
        $result = $statement->fetchAll();

        echo json_encode($result);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
}
elseif ($requestType == "POST") {
    echo "You sent a post!";

    // This code will not work without reading the body of the request and saving it in a $input array.
    // $name = $input["name"];
    // $color = $input["color"];

}

?> 