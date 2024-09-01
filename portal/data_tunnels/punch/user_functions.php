<?php
//imports
require_once './../../portal/database/db_conn.php';

//database instance
$db = new Database();
$connection = $db->snapConnect();

class UserFunctions {

    private $conn;

    // Constructor to accept database connection
    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function pushNewUserData($data0, $data1, $data2, $data3, $data4, $data5) {

        // Store the data received
        $this->data0 = $data0;
        $this->data1 = $data1;
        $this->data2 = $data2;
        $this->data3 = $data3;
        $this->data4 = $data4;
        $this->data5 = $data5;

        // Table config
        $table = 'users';

        // Column config
        $column0 = 'user_name';
        $column1 = 'f_name';
        $column2 = 'l_name';
        $column3 = 'contact_number';
        $column4 = 'password';
        $column5 = 'role_code';

        // SQL Insert statement
        $sql = "INSERT INTO $table ($column0, $column1, $column2, $column3, $column4, $column5) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }

        // Bind parameters (s - string, i - integer, d - double, b - blob)
        $stmt->bind_param("sssisi", $this->data0, $this->data1, $this->data2, $this->data3, $this->data4, $this->data5);

        // Execute the statement
        if ($stmt->execute()) {
            echo '
                <div class="prompt-wrapper">
                    <div class="prompt-inner">
                        <span class="prompt-text">New User Added!</span>
                    </div>
                </div>
                ';
        } else {
            echo "Error inserting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    public function deleteUserData($data0) {

        // Store the data received
        $this->data0 = $data0;
    
        // Table config
        $table = 'users';
    
        // Column config
        $column0 = 'user_name';
    
        $sql = "DELETE FROM $table WHERE $column0 = ?";
    
        if ($stmt = $this->conn->prepare($sql)) {
    
            $stmt->bind_param("s", $this->data0);
    
            if ($stmt->execute()) {
                echo '
                    <div class="prompt-wrapper">
                        <div class="prompt-inner">
                            <span class="prompt-text">User removed!</span>
                        </div>
                    </div>
                    ';
            } else {
                echo "Error deleting record: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
    
        } else {
            echo "Error preparing statement: " . $this->conn->error;
        }
    }    
}

?>