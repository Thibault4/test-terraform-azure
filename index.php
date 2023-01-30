<?php
echo "Works!";
$ip       = $_ENV['database_ip'];
$username = $_ENV['database_user'];
$password = $_ENV['database_password'];

$conn = pg_connect("host=thibaultpostgre.postgres.database.azure.com dbname=localdb user=thibault password=jira06Ra");
$result = pg_query($conn, "select * from products");
while ($row = pg_fetch_row($result)) {
    echo "id: $row[0]  name: $row[1] descript: $row[2] price: $row[3]";
}
?>