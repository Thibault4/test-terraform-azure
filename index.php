<?php
echo "Works! 1.1.1";
$ip       = $_ENV['database_ip'];
$username = $_ENV['database_user'];
$password = $_ENV['database_password'];

echo "ip=$ip username=$username password=$password"

$conn = pg_connect("host=$ip username=$username password=$password db=localdb");
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