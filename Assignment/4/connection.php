<?php
function Connect()
{
$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);
return $conn;
}
?>