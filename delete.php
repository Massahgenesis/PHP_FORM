<?php
require_once('connect.php');

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
<html>
<head>
<style>
        table,th,td {
            border: 1px solid black;
            padding: 15px;
            background-color:lightblue;
        }
    </style>
</head>
<body>
    
<form action="delete.php" method="GET">
     <!-- connection à la base de données -->

<?php



// afficher les données de la

$sql = "SELECT id, name,body, priority,type FROM message";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {
    echo "<table><tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Body</th>
                    <th>Priority</th>
                    <th>Type</th>
                    <th>Modifier</th>
                    <th>Supprimer</th></tr>";

// données de sortie de chaque ligne

while ($row = $result->fetch_assoc()) {

    echo "<tr>

    <td>".$row["id"]."</td>
    <td> ".$row["name"]. "</td>
    <td> ".$row["body"]. "</td>
    <td>".$row["priority"]."</td>
    <td> ".$row["type"]." </td>
    <td>".$row["modifier"]."
    <a href=modification.php?upd=".$row['id']."></a>
    </td>
    <td>".$row["supprimer"]."
    <a href=delete.php?sup=".$row["id"].">Supprimer</a>
    </td>
   
   </tr>";

}
echo "</table>";
} else {
    echo " 0 results";
}
$conn->close();
?>

</form>
</body>
</html>