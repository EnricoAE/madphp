<?php
// Import database connection
require_once './../portal/database/db_conn.php';

// Create database instance and connect
$db = new Database();
$connection = $db->snapConnect();

// Query to get user names
$user_name_query = "SELECT user_name FROM users";
$un_result = $connection->query($user_name_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../components/styles_gbl.css">
    <title>Users</title>
    <script>
        function validateForm() {
            const username = document.forms["userForm"]["u_name"].value.trim();
            const firstName = document.forms["userForm"]["f_name"].value.trim();
            const lastName = document.forms["userForm"]["l_name"].value.trim();
            const contactNumber = document.forms["userForm"]["contact_number"].value.trim();
            const password = document.forms["userForm"]["password"].value;
            const confirmPassword = document.forms["userForm"]["cfm_password"].value;
            const roleCode = document.forms["userForm"]["role_code"].value.trim();

            if (username === "") {
                alert("Username is required.");
                return false;
            }
            if (firstName === "") {
                alert("First Name is required.");
                return false;
            }
            if (lastName === "") {
                alert("Last Name is required.");
                return false;
            }
            if (contactNumber === "" || !/^\d{11}$/.test(contactNumber)) {
                alert("A valid 11-digit Mobile Number is required.");
                return false;
            }
            if (password === "" || password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }
            if (confirmPassword !== password) {
                alert("Passwords do not match.");
                return false;
            }
            if (roleCode === "" || !/^[123]$/.test(roleCode)) {
                alert("Role Code must be 1, 2, or 3.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <a href="./../index.php">back</a><br><br>

    <!-- Add user account -->
    <h1>Add User Account</h1>
    <form name="userForm" action="./../portal/data_tunnels/control.php" method="post" onsubmit="return validateForm()">
        <!-- username -->
        <input type="text" name="u_name" placeholder="Create Username"><br>

        <!-- first name -->
        <input type="text" name="f_name" placeholder="First Name"><br>

        <!-- last name -->
        <input type="text" name="l_name" placeholder="Last Name"><br>

        <!-- contact number -->
        <input type="tel" name="contact_number" placeholder="Mobile Number"><br><br>

        <!-- password -->
        <input type="password" name="password" placeholder="Create Password"><br>
        <input type="password" name="cfm_password" placeholder="Confirm Password"><br><br>

        <!-- role -->
        <select name="role_code">
            <option value="" disabled selected>Select a role</option>
            <option value="1">Admin</option>
            <option value="2">Director</option>
            <option value="3">Warehouse Personnel</option>
            <option value="4">Department Head</option>
        </select><br><br>

        <!-- form code & button -->
        <input type="hidden" name="form_code" value="000-0">
        <button type="submit">Test</button>
    </form><br><br>

    <!-- Delete user account -->
    <h1>Delete User Account</h1>
    <form action="./../portal/data_tunnels/control.php" method="post">

        <!-- User ID -->
        <select name="user_name">
            <option value="" disabled selected>Choose an account</option>
            <?php
            while ($row = $un_result->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($row['user_name']) . '">' . htmlspecialchars($row['user_name']) . '</option>';
            }
            ?>
        </select><br><br>

        <!-- form code & button -->
        <input type="hidden" name="form_code" value="000-1">
        <button type="submit">Test</button>
    </form><br><br>
</body>
</html>
