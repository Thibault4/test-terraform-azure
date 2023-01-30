<?php

$database_host      = $_ENV['database-ip'];
$database_username  = $_ENV['database-username'];
$database_password  = $_ENV['database-password'];

echo "host:$host username:$username password:$password";
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