<?php
//Connection to the database
//change the details here if your database uses different name
$servername = "localhost";
$dBUsername = "root";
$dbPassword = "root";
$dBName = "contadel";
//Only change the details above

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
} else {
    echo("connection succeed");
}
?>
