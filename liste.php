<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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

require_once('connect.php');

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
    <a href=modification.php?upd=".$row['id']."> modifier</a>
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
