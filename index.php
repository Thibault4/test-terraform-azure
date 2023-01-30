<?php
echo "Works 1.0.0!";
$ip       = $_ENV['database_ip'];
$username = $_ENV['database_user'];
$password = $_ENV['database_password'];

$server = "servsqltf-tp.postgres.database.azure.com";
$username = "postgresteiva@servsqltf-tp.postgres.database";
$password = "Password####PG";
$db = "pg_teiva_francis";
$conn = pg_connect("host=$server dbname=$db user=$username password=$password");
$result = pg_query($conn, "SELECT * FROM products");
        if (!$result) {
            echo json_encode(array("error" => "An error occurred."));
            exit;
        }
        $response = array();
        while ($row = pg_fetch_row($result)) {
            $response[] = array("Id" => $row[0], "Name" => $row[1], "Desc" => $row[2], "Prix" => $row[3]);
        }
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
?>