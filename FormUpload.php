<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="cssForm.css">

<title>Document</title>
<html>

<body>
<h1 style="margin-left: 40.5rem">Upload Image</h1>
    <div class="form1 form2">

        <div class="form">
            <form action="Upload.php" method="POST" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload" class="inputa">
                <label>Description</label>
                <input type="text" name="description" class="inputa">
                <br>
                <label>Price</label>
                <input type="text" name="price" class="inputa">
                <br>
                <button type="submit" value="Upload Image" name="submit" style="margin:0.5rem 8rem; width:7rem">Upload Image
            </form>
        </div>
    </div>
</body>

</html>