<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;",$username,$password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE IF NOT EXISTS records";
  $sql2 = "CREATE TABLE IF NOT EXISTS details (
    phone_no INT NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    second_name VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    PRIMARY KEY (phone_no)
)";
$sql3 = "USE records";
$conn->exec($sql);
echo "1.<br>";
$conn->exec($sql3);
echo "2.<br>";
$conn->exec($sql2);
  echo "CONNECT SUCCESSFULLY.<br>";
} catch (PDOException $e) {
  echo "connection failed1 <br>". $e->getMessage();
}
?>