<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "ajax";
    private $conn = false;
    
    public function __construct() {
            $this->connect();
    }
    

    public function connect() {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->conn->connect_error > 0) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            return $this->conn;
        }
    }
    
    public function query($sql){
        $connection = $this->connect();
        
        $result = $connection->query($sql);
        return $result;
    }
}