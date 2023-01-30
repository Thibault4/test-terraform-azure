<?php

$database_host      = $_ENV['database-ip'];
$database_username  = $_ENV['database-username'];
$database_username  = $_ENV['database-password'];


try {
  $pdo = new PDO('pgsql:host=thibaultpostgre.postgres.database.azure.com;port=5432;dbname=localdb', 'thibault@thibaultpostgre', 'jira06Ra');
} catch (Exception $e) {
  echo 'Exception reçue : ', $e->getMessage(), "\n";
}

$stmt = $pdo->query("SELECT * FROM products");
while ($row = $stmt->fetch()) {
  $response[] = array("Id" => $row[0], "Name" => $row[1], "Desc" => $row[2], "Prix" => $row[3]);
}
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
$pdo->$connection = null;
?>