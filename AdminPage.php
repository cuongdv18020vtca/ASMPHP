<?php
ob_start();
session_start();
if (isset($_SESSION["email"]) && $_SESSION["userlevel"]==1) {
   
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="cssForm.css">
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

            <title>Document</title>
        </head>
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");

                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>


        <body>
                    <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Users')" style="color:black">User</button>
                <button class="tablinks" onclick="openCity(event, 'Products')" style="color:black">Product</button>
                <button class="tablinks" name="home"><a href="displayProduct.php" style="color:black; ">Home</a></button>

                <button class="tablinks" name="logout" style="margin-left:55rem"><a href="LogOut.php" style="color:black; ">LogOut</a></button>

            </div>


            <div id="Users" class="tabcontent">
                <div class="container">
                    <div class="header">
                        <h1>
                            Information of User
                        </h1>

                    </div>
                    <?php

                            include('Mysqli_ConnectionOnlineshop.php');
                            $sql = "SELECT * From user";
                            $result  = $conn->query($sql);

                            echo '<table>
                    <tr>
                    <th>User_ID</th>
                    <th>First_name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                    ';
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                    <tr>
                    <div class = "page">
                    <td> ' . $row["userID"] . '</td>
                    <td> ' . $row["first_name"] . '</td>
                    <td> ' . $row["last_name"] . '</td>
                    <td> ' . $row["email"] . '</td>
                    <td> <a href ="FormRegister.php">Add</a></td>
                    <td> <a href = "EditProcess.php?id=' . $row["userID"] . '">Edit</a></td>
                    <td> <a href = "DeleteProcess.php?id=' . $row["userID"] . '">Delete</a></td>
                    </div>
                    </tr>
                    
                    ';
                                }
                            } else {
                                echo "0 results";
                            }
                            echo '</table>';
                            $conn->close();

                            ?>
                </div>
            </div>
            <div id="Products" class="tabcontent">
                <div class="container">
                    <div class="header">
                        <h1>
                            Information of Products
                        </h1>

                    </div>
                    <?php

                            include('Mysqli_ConnectionOnlineshop.php');
                            $sql = "SELECT * From products";
                            $result  = $conn->query($sql);

                            echo '<table>
                    <tr>
                    <th>ProductID</th>
                    <th>ProductName</th>
                    <th>ProductImage</th>
                    <th>Price</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                    ';
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                    <tr>
                    <div class = "page">
                    <td> ' . $row["productID"] . '</td>
                    <td> ' . $row["productName"] . '</td>
                    <td> ' . $row["productImage"] . '</td>
                    <td> ' . $row["price"] . '</td>
                    <td> <a href = "FormUpload.php">Add</a></td>
                    <td> <a href = "EditProduct.php?id=' . $row["productID"] . '">Edit</a></td>
                    <td> <a href = "DeleteProduct.php?id=' . $row["productID"] . '">Delete</a></td>
                    </div>
                    </tr>
                    ';
                                }
                            } else {
                                echo "0 results";
                            }
                            echo '</table>';
                            $conn->close();

                            ?>
                </div>
            </div>


        </body>

        </html>
<?php
    
}
else {
    header('Location:displayProduct.php');
}
ob_end_flush();
?>