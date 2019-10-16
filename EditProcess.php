<?php
session_start();
?>
<?php
require("Mysqli_ConnectionOnlineshop.php");
$id = $_GET["id"];

$query = "select * from user where userID = '$id'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $_SESSION["first_nameEdit"] = $row["first_name"];
    $_SESSION["last_nameEdit"] = $row["last_name"];
    $_SESSION["emailEdit"] = $row["email"];
    header('Location:FormEdit.php?id=' . $row["userID"] . '');
} else {
    echo "Not Found !";
}
$first_name = $_POST["first_nameEdit"];
$last_name = $_POST["last_nameEdit"];
$email = $_POST["emailEdit"];
$userID = $id;
$sql = "update user set first_name = ?,last_name =?, email = ? where userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $first_name, $last_name, $email, $userID);
if (isset($_POST["submit"])) {
    if ($stmt->execute()) {
        header('Location:AdminPage.php');
    } else {
        echo "Update Failed";
    }
}


?>