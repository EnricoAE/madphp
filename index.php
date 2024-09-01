<?php
//imports
require_once './portal/database/db_conn.php';

//database instance
$db = new Database();
$connection = $db->snapConnect();

?>

<!-- Markup Start -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./components/styles_gbl.css">
    <title>Invex</title>
</head>
<body>
    <a href="./pages/usermanagement.php">User Management</a><br>
    <a href="./pages/inventory.php">Inventory</a><br>
    <a href="./pages/requests.php">Requests</a><br>
</body>
</html>