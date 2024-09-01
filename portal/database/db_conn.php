<?php

class Database {
    private $host = "localhost";
    private $db_name = "invex_dummy";
    private $db_username = "root";
    private $db_password = "";
    private $conn;

    public function snapConnect() {
        
        if($this->conn == null){

            $this->conn = new mysqli (
                $this->host,
                $this->db_username,
                $this->db_password,
                $this->db_name
            );

            if($this->conn->connect_error){
                die("Connection failed: " . $this->conn->connect_error);
            }

            return $this->conn;

        }

    }

    public function closeConnection(){
        if($this->conn != null){
            $this->conn->close();
            $this->conn = null;
        }
    }

}