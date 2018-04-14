<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/dbconnect.php';
 
// instantiate person object
include_once '../model/person.php';
 
$database = new Database();
$db = $database->getConnection();
 
$person = new person($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set person property values
$person->Navn = $data->Navn;
$person->EfterNavn = $data->EfterNavn;
 
// create the person
if($person->create()){
    echo '{';
        echo '"message": "person was created."';
    echo '}';
}
 
// if unable to create the person, tell the user
else{
    echo '{';
        echo '"message": "Unable to create person."';
    echo '}';
}
?>