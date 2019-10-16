<?php
    try {
        require("Mysqli_connectionOnlineshop.php");
        if ($conn->connect_error) {
            die("Connection failed:" .$conn->connect_error);
        }
        echo "Connected succesfully";
    } catch (Exception $e) {
        echo "Caught Exception:" .$e->getMessage(),"\n";   

    }
?>