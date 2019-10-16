<?php
session_start();
?>
<?php
    $FirstErr =  $LastNameErr = $EmailErr = "";
    $FirstName =  $LastName = $Email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $_SESSION["ErrFirst"] = "firstname required";
        } else {
            $FirstName = test_input($_POST["first_name"]);
        }
        if (empty($_POST["last_name"]) == "POST") {
            $_SESSION["ErrLast"] = "last_name required";
        } else {
            $LastName = test_input($_POST["last_name"]);
        }
        if (empty($_POST["email"]) == "POST") {
            $_SESSION["ErrEmail"] = "email required";
        } else {
            $Email = test_input($_POST["email"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>