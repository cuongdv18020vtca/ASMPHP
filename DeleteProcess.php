<?php
require("Mysqli_ConnectionOnlineshop.php");
$id = $_GET["id"];
    $query = "delete from user where userID=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$id);
   
    if ($stmt->execute()) {
        header('Location:AdminPage.php');
    } else {
        echo "Delete Failed";
    }
?>
