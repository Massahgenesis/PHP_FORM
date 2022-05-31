<?php

$name =$_POST["name"];
$message =$_POST["message"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

if ( ! $terms) {
    die("Terms must be accepted"); 
}

$host = "localhost";
$dbname = "formulaire_db";
$username = "root";
$password = "";