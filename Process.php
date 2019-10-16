<?php
session_start();
try {
        require("Mysqli_ConnectionOnlineshop.php");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
    // Get form inputs

    if (isset($_POST["submit"])) {
        if (empty($_POST["first_name"]) or empty($_POST["last_name"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["re-password"])) {
            $_SESSION["Err"] = "Vui long khong de trong";
            header('Location:FormRegister.php');
        } elseif ($_POST["password"] != $_POST["re-password"]) {
            $_SESSION["Err"] = "Re-password is not correct!!!";
            header('Location: FormRegister.php');
        } else {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $password1 = $_POST["password"];
            $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
            // Make and prepare the query                                               
            $query = "INSERT INTO user (first_name, last_name, email, UserLevel, passwords, registration_date) ";
            $query .= "VALUES(?, ?, ?, 2, ?, NOW())";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_passcode);
            // Run and check the query's result
            if ($stmt->execute()) {    // One record inserted	
                $_SESSION["Err"] = "Register Successfully :-)";
                header('Location:AdminPage.php');
            } else { // If it did not run OK.
                echo "K them dc";
                $errorstring = "<p class='text-center col-sm-8' style='color:red'>";
                $errorstring .= "System Error<br />You could not be registered due ";
                $errorstring .= "to a system error. We apologize for any inconvenience.</p>";
                exit();
            }
        }
    }
     else if (isset($_POST["login"])) {
        header('Location:LoginFormOnlineShop.php');
        exit();
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// Close statement and connection
// $stmt->close();
$conn->close();
?>
