<?php
session_start();
include('config.php');
$id = $_GET['id'];
$status = $_GET['status'];

if ($status == "Approve") {
    if (mysqli_query($db,"UPDATE `product` SET `status`='$status' WHERE `productId` = $id")) {
        echo "<script>alert('$id has been Approve');</script>";
        echo '<script>window.location="approveProducts.php";</script>';
    }
} else {
    if (mysqli_query($db,"UPDATE `product` SET `status`='$status' WHERE `productId` = $id")) {
        echo "<script>alert('$id has been Reject');</script>";
        echo '<script>window.location="approveProducts.php";</script>';
    }
}
?>