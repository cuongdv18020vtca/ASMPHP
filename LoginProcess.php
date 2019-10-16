<?php
session_start();
?>
<?php

try {
    require("Mysqli_ConnectionOnlineshop.php");
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }
    if (isset($_POST["login"])) {
        if (empty($_POST["email"]) or empty($_POST["password"])) {
            $_SESSION["Err"] = "Vui long khong de trong";
            header('Location:LoginFormOnlineShop.php');
        } else {
            $Username = $_POST["first_name"];
            $Password = $_POST["password"];
            
            $query = "select * from user";
            $result = $conn->query($query);
            if (isset($_POST["login"])) {
                while ($row = $result->fetch_assoc()) {
                    if (password_verify($_POST["password"], $row["passwords"]) && $row["email"] === $_POST["email"]) {
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["userlevel"] = $row["UserLevel"];
                        header('Location:AdminPage.php');
                        break;
                    } else {
                        $_SESSION["Err"] = "Email or password invalid!";
                        header('Location: LoginFormOnlineShop.php');
                    }
                }
            }
        }
    }
    elseif (isset($_POST["register"])) {
        header('Location: FormRegister.php');
    }
} catch (\Throwable $th) {
    //throw $th;
}
