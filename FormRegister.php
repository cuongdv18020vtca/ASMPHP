<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cssForm.css">
    <title>Document</title>
</head>

<body>


    <div class="form1 form2">
        <div class="form">
            <h1 style="padding-left:72px">Register</h1>
            <div id="Err"><?php echo $_SESSION["Err"] ?></div>
            <br>
            <form action="Process.php" method="POST">
                <!-- <label>UserID</label>
        <input type="text" name=" UserID"> -->
                <div class="row">
                    <label> First Name</label>
                    <input type="text" name=" first_name">
                    <span class="error"> <?php echo $$_SESSION["ErrFirst"]; ?></span>
                </div>
                <br>
                <br>
                <div class="row">
                    <label>Last_name </label>
                    <input type="text" name=" last_name">
                    <span class="error"> <?php echo $LastNameErr; ?></span>
                </div>
                <br>
                <br>
                <div class="row">
                    <label>Email</label>
                    <input type="text" name="email">
                    <span class="error"> <?php echo $EmailErr; ?></span>
                </div>
                <br><br>
                <div class="row">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <br><br>
                <div class="row">
                    <label>Re-Password</label>
                    <input type="password" name="re-password">
                </div>
                <br>
                <div class="button">


                    <button type="text" name="login">Login</button>
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>