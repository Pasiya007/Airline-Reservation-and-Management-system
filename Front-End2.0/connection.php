<?php
    $conn = new mysqli("localhost", "root", "", "airline_db_test2");
    
    if ($conn->connect_error) {
        die(json_encode([
            "success" => false,
            "message" => "Connection Failed: " . $conn->connect_error
        ]));
    }
    
    // Set charset to utf8mb4 for better character support
    $conn->set_charset("utf8mb4");
?>