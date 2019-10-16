<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Product</title>
    <link rel="stylesheet" href="cssForm.css">
</head>

<body>
    <?php
    $id = $_GET['id'];
    ?>
    <h1 style="margin-left: 40.5rem">Edit Product</h1>
    <div class="form1 form2">
        <div class="form">
            <form action="EditProduct.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload" class="inputa">
                <br>
                <label>Desciption</label>
                <input type="text" value="<?php echo $_SESSION["desciption"] ?>" name="desciption" class="inputa">
                <br>
                <br>
                <label>Email</label>
                <input type="text" value="<?php echo $_SESSION["price"] ?>" name="price" class="inputa">

                <button type="submit" value="Upload Image" name="submit" style="margin:0.5rem 8rem; width:7rem"> Upload Image

            </form>
        </div>
    </div>
</body>

</html>