<?php 
// Database connectie
$conn = new mysqli('localhost', 'username', 'password', 'database_name');

// Controleer of er verbinding is met de database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Stel een Session in
session_start();

// Voer een SQL query uit om alle data uit de tabel te halen
$sql = "SELECT * FROM tabelnaam";
$result = $conn->query($sql);

// Geef de data op de pagina weer
if ($result->num_rows > 0) {
    // Zet alle ID's op een array
    $idArray = array();
    while($row = $result->fetch_assoc()) {
        // Voeg elke ID toe aan het array
        $idArray[] = $row["id"];
    }
    // Sla het array op in de Session
    $_SESSION["idArray"] = $idArray;
} else {
    echo "0 results";
}
$conn->close();

// Start de Session op de volgende pagina
session_start();

// Geef de ID's op de pagina weer
foreach ($_SESSION["idArray"] as $id) {
    echo $id . "<br>";
}