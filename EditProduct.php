<?php
session_start();
?>
<?php
ob_start();
$id =  $_GET['id'];
require("Mysqli_ConnectionOnlineshop.php");
$query = "select * from products where productID = $id";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $_SESSION["desciption"] = $row["productName"];
    $_SESSION["productImage"] = $row["productImage"];
    $_SESSION["price"] = $row["price"];
    header('Location:FormEditProduct.php?id=' . $row["productID"] . '');
} else {
    echo "Not Found !";
}
$desciption = $_POST["desciption"];
$price = $_POST["price"];
$productID = $id;
$productImage = $_POST["fileToUpload"];
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists

$sql = "update products set productImage = ?,productName =?, price = ? where productID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdi", $productImage, $desciption, $price, $productID);
$target_dir = "upload/";
$desciption = $_POST["desciption"];
$price = $_POST["price"];
$productID = $id;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$productImage  = $target_file;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    @unlink($target_file);
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

echo "hihi";
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} 
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image


if (isset($_POST["submit"])) {
    if ($stmt->execute() === true) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        echo "The file " . $target_file . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        header('Location:AdminPage.php');
    } else {
        echo "Update Failed";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}




ob_end_flush();
?>