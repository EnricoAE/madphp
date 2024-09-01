<?php
//imports
require_once './../../portal/database/db_conn.php';

//database instance
$db = new Database();
$connection = $db->snapConnect();

class RequestFunctions {

    private $conn;

    // Constructor to accept database connection
    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function pushNewRequestData($data0, $data1, $data2, $data3) {

        // Store the data received
        $this->data0 = $data0;
        $this->data1 = $data1;
        $this->data2 = $data2;
        $this->data3 = $data3;

        // Table config
        $table = 'requests';

        // Column config
        $column0 = 'req_name_brand';
        $column1 = 'req_quantity';
        $column2 = 'justification';
        $column3 = 'user_id_inquiry';

        // SQL Insert statement
        $sql = "INSERT INTO $table ($column0, $column1, $column2, $column3) VALUES (?, ?, ?, ?)";

        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }

        // Bind parameters (s - string, i - integer, d - double, b - blob)
        $stmt->bind_param("sisi", $this->data0, $this->data1, $this->data2, $this->data3);

        // Execute the statement
        if ($stmt->execute()) {
            echo '
                <div class="prompt-wrapper">
                    <div class="prompt-inner">
                        <span class="prompt-text">New Request Sent!</span>
                    </div>
                </div>
                ';
        } else {
            echo "Error inserting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

?>