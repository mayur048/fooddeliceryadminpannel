<?php
session_start();
include('config.php');
$id = $_GET['id'];
$status = $_GET['status'];

if ($status === "Approve") {
    if (mysqli_query($db,"UPDATE `product` SET `status`='$status' WHERE `productId` = $id")) {
        echo "<script>alert('$id has been Approve');</script>";
        echo '<script>window.location="approveProducts.php";</script>';
    }
} else {
    if ($status === "Reject"){
        if (mysqli_query($db,"UPDATE `product` SET `status`='$status' WHERE `productId` = $id")) {
            echo "<script>alert('$id has been Reject');</script>";
            echo '<script>window.location="approveProducts.php";</script>';
        }
    }
}

if ($status === 0) {
    if (mysqli_query($db,"UPDATE `admindetails` SET `isActive`= 1 WHERE `AD_ID` = $id")) {
        mysqli_query($db,"UPDATE `login` SET `isActive`= 1 WHERE `AD_ID` = $id");
        echo "<script>alert('$id has been Approve');</script>";
        echo '<script>window.location="view%20admin.php";</script>';
    }
} else {
    if ($status === 1) {
        if (mysqli_query($db,"UPDATE `admindetails` SET `isActive`= 0 WHERE `AD_ID` = $id")) {
            mysqli_query($db,"UPDATE `login` SET `isActive`= 0 WHERE `AD_ID` = $id");
            echo "<script>alert('$id has been Revoked');</script>";
            echo '<script>window.location="view%20admin.php";</script>';
        }
    }
}

if ($status == "Close") {
    if (mysqli_query($db,"UPDATE `shop` SET `isActive`= 1 WHERE `ShopId` = $id")) {
        // mysqli_query($db,"UPDATE `login` SET `isActive`= 1 WHERE `AD_ID` = $id");
        // echo "<script>alert('$id has been Approve');</script>";
        echo '<script>window.location="viewShop.php";</script>';
    }
} else {
    if ($status == "Open") {
        if (mysqli_query($db,"UPDATE `shop` SET `isActive`= 0 WHERE `ShopId` = $id")) {
            // mysqli_query($db,"UPDATE `login` SET `isActive`= 0 WHERE `AD_ID` = $id");
            // echo "<script>alert('$id has been Revoked');</script>";
            echo '<script>window.location="viewShop.php";</script>';
        }
    }
}

?>
