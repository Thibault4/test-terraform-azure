<?php

$database_host      = $_ENV['database_ip'];
$database_username  = $_ENV['database_username'];
$database_password  = $_ENV['database_password'];

echo "host $database_host";
echo "<br>"; 
echo "username $database_username";
echo "<br>";
echo "pass $database_password";
echo "<br>";

try {
  $pdo = new PDO("pgsql:host=$database_host;port=5432;dbname=localdb", $database_username, $database_password);
} catch (Exception $e) {
  echo 'Exception reçue : ', $e->getMessage(), "\n";
}

$stmt = $pdo->query("SELECT * FROM products");
while ($row = $stmt->fetch()) {
  $response[] = array("Id" => $row[0], "Name" => $row[1], "Desc" => $row[2], "Prix" => $row[3]);
}
header("Access-Control-Allow-Origin: ");
header("Access-Control-Allow-Headers:");
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
$pdo->$connection = null;
?>