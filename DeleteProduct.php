<?php
require("Mysqli_ConnectionOnlineshop.php");
$id = $_GET["id"];

    $query = "delete from products where productID= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$userID);
    $userID = $id;
   
        if ($stmt->execute()===true) {
            header('Location:AdminPage.php');
        } else {
            echo "Delete Failed";
        }
?>