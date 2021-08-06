<?php
$servername = 'localhost';
$username = 'adansinghani1';
$password = 'adansinghani1';
$dbname= 'address';
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno()){
  echo "Failed to connect".mysqli_connect_errno();
}

 ?>
