
<?php 
  function conexion(){
    return mysqli_connect('localhost',
                'root',
                '',
                'php_login_database');
  }

  

 ?>




<?php

$server = 'localhost:3306';
$username = 'arduino';
$password = '123456';
$database = 'php_login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
