<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mikdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, Navn, EfterNavn FROM mittable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	    // products array
    $products_arr=array();
    $products_arr["personer"]=array();
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "ID" => $ID,
            "Navn" => $Navn,
            "EfterNavn" => $EfterNavn
        );
        
 
        array_push($products_arr["personer"], $product_item);

    }
 echo json_encode($products_arr);
    
} 
else {
    echo "0 results";
}
$conn->close();
?>