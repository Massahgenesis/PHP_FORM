<?php
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <title>contacts</title>
</head>
<body>
<h1>Contact</h1>

<form  method="POST">
    <label for="name">Name</label>
    <input type="text" id="name" name="name">
    <label for="message">Message</label>
    <textarea id="message" name="message"></textarea>

    <label for="priority">Priority</label>
    <select id="priority" name="priority">
        <option value="1">Low</option>
        <option value="2" selected >Medium</option>
        <option value="3">High</option>
    </select>

    <fieldset>
        <legend>Type</legend>
            <label >

                <input type="radio" name="type" value="1" checked>
                Complaint
            </label>

            <br>

            <label >
                <input type="radio" name="type" value="2">
                suggestion
            </label>
    </fieldset>
    <label for="">
        <input type="checkbox" name="terms">
        I agree to the terms and conditions
    </label>

    <br>

    <button>Send</button>
</form>


<?php

// recuperation de l'id

if (isset($_GET["upd"])){
    $upd = $_GET["upd"];
    $name = $_POST["name"];
    $message = $_POST["message"];
    $priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST, "type",FILTER_VALIDATE_INT);

    $req= $conn->query("UPDATE message SET name='$name',body='$message',priority='$priority',type='$type' WHERE id=$upd");
    if($req){
        echo "updating succesful";
        echo "<a href=\"liste.php\">AFFICHER</a>";
    }
}
?>

</body>
</html>