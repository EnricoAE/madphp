<?php
//imports
require_once './../../portal/database/db_conn.php';

//database instance
$db = new Database();
$connection = $db->snapConnect();

class InventoryFunctions {

    private $conn;

    // Constructor to accept database connection
    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function pushNewItemData($data0, $data1, $data2, $data3, $data4, $data5, $data6) {

        // Store the data received
        $this->data0 = $data0;
        $this->data1 = $data1;
        $this->data2 = $data2;
        $this->data3 = $data3;
        $this->data4 = $data4;
        $this->data5 = $data5;
        $this->data6 = $data6;

        // Table config
        $table = 'inventory';

        // Column config
        $column0 = 'item_name_brand';
        $column1 = 'unit_type';
        $column2 = 'quantity';
        $column3 = 'in_stock';
        $column4 = 'date_dlvd';
        $column5 = 'out_stock';
        $column6 = 'item_category';

        // SQL Insert statement
        $sql = "INSERT INTO $table ($column0, $column1, $column2, $column3, $column4, $column5, $column6) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }

        // Bind parameters (s - string, i - integer, d - double, b - blob)
        $stmt->bind_param("ssiisis", $this->data0, $this->data1, $this->data2, $this->data3, $this->data4, $this->data5, $this->data6);

        // Execute the statement
        if ($stmt->execute()) {
            echo '
                <div class="prompt-wrapper">
                    <div class="prompt-inner">
                        <span class="prompt-text">New Item Added!</span>
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