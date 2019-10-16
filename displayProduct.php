<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" sizes="192x192" href="img/178f6b924bbee8befb5cf61c9a17a12e.png">
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">

    <title>Display</title>
</head>

<body>
    <?php
    require("header.php");
    require("Mysqli_ConnectionOnlineshop.php");
    /*Tìm tổng số Record*/
    $result = mysqli_query($conn, 'select count(productID) as total from products');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 15;

    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    // Tìm Start
    $start = ($current_page - 1) * $limit;

    ?>
    <div>
        <img style="max-width:100%; width: 100%" src="./Săn hàng tồn.png" alt="">
    </div>
    <div class="container">
        <div>
            <img src="./giao hàng nhanh trong ngày.png" alt="" class="p1">
            <img src="./hàng chính hãng.png" alt="" class="p1">
            <img src="./Trả góp.png" alt="" class="p1">
            <img src="./ưu đãi từ đối tác.png" alt="" class="p1">
        </div>
    </div>
    <div class="container" style="margin-left:30rem">

        <img src="./cơ hội cuối cùng.png" alt="">
    </div>
    <div class="container">
        <div class="wrap">
            <?php


            $sql = "select * from products limit $start,$limit";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                <div class="product">
                            <a href="EditProduct.php?id=' . $row["productID"] . '">
                                <div class="product__image">
                                    <img src="' . $row["productImage"] . '" alt="">
                                </div>
                                
                                <div class="product__title">
                                    <i class="icon icon-tikinow">' . $row["productName"] . '</i>
                                </div>
                                <span class="product__sale">
                                    <span class="product__sale-final">
                                        <span class="product__sale-percent">
                                            -10%
                                        </span>
                                    </span>
                                    <span class="product__sale-regular">' . $row["price"] . ' ₫</span>
                                </span>
                                <div class="product__installment">
                                    Trả góp 0% chỉ 299.167 ₫/tháng
                                </div>
                                <div class="product__review">
                                    <div class="product__review-start">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span class="product__review-start-y">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <div class="product__review-text">(252 nhận xét)</div>
                                </div>
                            </a>
                        
                   </div>';
                }
            }

            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1) {
            echo '<div class="page">
            <a  href="displayProduct.php?page=' . ($current_page - 1) . '">Prev</a>
            </div>';
        }

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<div class="page">
                    <span style="color:red;border:1px solid grey;padding: 7px;" >' . $i . '</span>  
                    </div>';
            } else {
                echo '<div class="page">
                <a  href="displayProduct.php?page=' . $i . '">' . $i . '</a>
                </div>';
            }
        }

        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1) {
            echo '<div class="page">
            <a  href="displayProduct.php?page=' . ($current_page + 1) . '">Next</a>
            </div>';
        }
            ?>
        </div>
        <?php
        
        ?>
        <!-- <div class="giatotthangnay">
            <img src="./gia tốt tháng này.png" alt="" style="margin-left:19rem">
        </div> -->



    </div>
    <?php
    require("footer.php");
    ?>

</body>

</html>