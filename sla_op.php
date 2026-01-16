<?php
    include("conection.php");


$name = $conn->real_escape_string($_POST["name"]);
$comment = $conn->real_escape_string($_POST["comment"]);

$query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
$conn->query($query);

header("Location: index.php");
exit;