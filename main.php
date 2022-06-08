<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=records",$username,$password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE IF NOT EXISTS records";
  $sql2 = "CREATE TABLE IF NOT EXISTS publishers (
    publisher_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (publisher_id)
)";
$sql3 = 'SELECT publisher_id, name 
FROM publishers';
  $fname = $_POST["fname"];
  $sql = "INSERT INTO `publishers` (publisher_id,name) VALUES ('0','$fname')";
  // use exec because no results are returned.
  //echo $conn->exec("show tables");
  $conn->exec($sql);
  $conn->exec($sql2);
  $statement = $conn->query($sql3);
  $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);
  print_r($publishers);
  if ($publishers) {
    foreach ($publishers as $publisher) {
      echo $publisher['name'] . '<br>';
      echo $publisher['publisher_id'];
    }
  }
 //echo $conn->query("show databases");
 //$conn->closeCursor();

  //$conn->exec($sql);
  echo "CONNECT SUCCESSFULLY.<br>";
} catch (PDOException $e) {
  echo "connection failed <br>". $e->getMessage();
}
$conn = null;
?>