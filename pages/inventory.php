<?PHP
//imports
require_once './../portal/database/db_conn.php';

//database instance
$db = new Database();
$connection = $db->snapConnect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../components/styles_gbl.css">
    <title>Inventory</title>
</head>
<body>
    <a href="./../index.php">< back</a><br><br>
    <form action="./../portal/data_tunnels/control.php" method="post">
        <!-- item name -->
        <input type="text" name="item_name" placeholder="Item Name/Brand"><br>

        <!-- unit type -->
        <input type="text" name="unit_type" placeholder="Unit Type e.g.: Boxed/Bottled"><br>

        <!-- quantity -->
        <input type="number" name="quantity" placeholder="Quantity"><br>

        <!-- in stock -->
        <input type="number" name="in_stock" placeholder="Stock In"><br>

        <!-- in stock -->
        <input type="date" name="date_dlvd"><br>

        <!-- out stock -->
        <input type="number" name="out_stock" placeholder="Stock Out"><br>

        <select name="item_category">
            <option value="Tech Equipment">Uncategorized</option>
            <option value="Tech Equipment">Tech Equipment</option>
            <option value="Tech Equipment">Furniture</option>
            <option value="Tech Equipment">Art Equipment</option>
            <option value="Tech Equipment">Books / Literature</option>
        </select><br><br><br>

        <input type="hidden" name="form_code" value="001-0">
        <button type="submit">Test</button>
    </form>
</body>
</html>