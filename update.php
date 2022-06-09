

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

$sql = "UPDATE message SET name=? body=? priority=? type=? 
WHERE some_column=some_value";

if ($conn->query($sql) === TRUE){

    echo "Record updated succesfully";
}   else {
    echo "Error updating record: " . $conn->error;
}

$conn->close() ;
?>