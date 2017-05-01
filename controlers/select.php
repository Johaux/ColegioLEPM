<?php
$servername = "localhost";
$username = "johan";
$password = "123456789";
$dbname = "dbprueba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT NroDocumento, Nombres, Apellidos FROM tblestudiantes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "NroDocumento: " . $row["NroDocumento"]. " - Name: " . $row["Nombres"]. " " . $row["Apellidos"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
