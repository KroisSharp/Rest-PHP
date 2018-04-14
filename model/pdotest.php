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

$sql = "INSERT INTO mittable (Navn, EfterNavn)
VALUES ('Navn', 'EfterNavn')"; //mangler at hente values fra inc string

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>