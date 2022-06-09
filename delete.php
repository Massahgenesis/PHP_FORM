<?php
$host = "localhost";
$dbname = "formulaire_db";
$username = "root";
$password = "";
        
$conn = mysqli_connect($host,
                       $username,
                       $password,
                       $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}  

// déclaration de variable et recuperation de l'id

if (isset($_GET["sup"]))
{
    $sup = $_GET["sup"];
}

// supprimer une donnée dans la BDD

if ($conn->connetc_error) {
    die("connection failed: " . $conn->connetc_error);
}
// sql to delete a record

$sql = "DELETE FROM message WHERE id=$sup";

if ($conn->query($sql) === TRUE) {

    echo "Record deleted successfully";
}   else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>