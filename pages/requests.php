<?php
// Import database connection
require_once './../portal/database/db_conn.php';

// Create database instance and connect
$db = new Database();
$connection = $db->snapConnect();

//SAMPLE USER ID
$userid = 100705;

// Query to get items
$query = "SELECT item_name_brand FROM inventory";
$result = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../components/styles_gbl.css">
    <title>Requests</title>
</head>
<body>
    <a href="./../index.php">< back</a><br><br>
    <form action="./../portal/data_tunnels/control.php" method="post">
        <!-- item name - pulled from db -->
        <select name="item_name">
            <option value="" disabled selected>Select an item</option>
            <?php
            // Populate <select> with items from the database
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($row['item_name_brand']) . '">' . htmlspecialchars($row['item_name_brand']) . '</option>';
            }
            ?>
        </select><br>

        <!-- requested quantity -->
        <input type="number" name="quantity_request"><br>

        <!-- justification -->
        <textarea name="justification"></textarea><br><br><br>

        <!-- userid -->
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userid); ?>">

        <input type="hidden" name="form_code" value="002-0">
        <button type="submit">Test</button>
    </form>
</body>
</html>
