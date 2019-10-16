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
    <?php
    $id = $_GET["id"];
   
    // include("EditProcess.php");
    ?>
    <h1 style="margin-left: 36.5rem">Edit User</h1>
    <div class="form1 form2">
        <div class="form">
            <form action="EditProcess.php?id=<?php echo $id ?>" method="POST">
                <label>First_name</label>
                <input type="text" value="<?php echo $_SESSION["first_nameEdit"] ?>" name="first_nameEdit" class="inputa">
                <br>
                <label>Last_name</label>
                <input type="text" value="<?php echo $_SESSION["last_nameEdit"] ?>" name="last_nameEdit" class="inputa">
                <br>
                <br>
                <label>Email</label>
                <input type="text" value="<?php echo $_SESSION["emailEdit"] ?>" name="emailEdit" class="inputa">
                <button type="submit" name="submit" value="submit" style="margin:0.5rem 5rem"> Submit
            </form>
        </div>
    </div>
</body>

</html>