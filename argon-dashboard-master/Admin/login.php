<?php 
  include 'config.php';
  if (isset($_POST['submit'])) {
    $adminEmail = $_POST['Email'];
    $adminPassword = $_POST['Password'];
    $dbQuery = mysqli_query($db,"SELECT * FROM `login` WHERE `email` = '$adminEmail'");
    $dbResult = "";
    if (mysqli_num_rows($dbQuery) == 0) {
      echo "<script>alert('No account Exists with this Email!'); window.location.replace('index.php'); </script>";
    } else {
      $dbResult = mysqli_fetch_assoc($dbQuery);
      if ($adminPassword != $dbResult['password']) {
        echo '<script>alert("Wrong Email or Password!! Try login !!"); window.location.replace("index.php"); </script>';
      } else {
        if ($dbResult['isActive'] == 1) {
          session_start();
          $_SESSION['Email'] = $adminEmail;
          $_SESSION['Role'] = $dbResult['roleId'];
          $_SESSION['ID'] = $dbResult['userId'];
          // echo '<script>alert("Welcome !!");window.location.replace("dashboard.php");</script>';
          echo '<script>window.location.replace("dashboard.php");</script>';
        } else {
          echo '<script>alert("You access has been Revoked!!");window.location.replace("dashboard.php");</script>';
        }
      }
    }
  }
?>