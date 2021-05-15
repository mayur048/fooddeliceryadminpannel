<?php
   session_start();
  include('config.php');
  if (!isset($_SESSION['Email'])) {
    echo '<script>window.location="cloudKitchen_1.php";</script>';
  } else {
    if(isset($_POST['submit'])) {
      $sessionEmail = $_SESSION['Email'];
      $dbQuery = mysqli_query($db,"SELECT * FROM `admindetails` WHERE `AD_Email` = '$sessionEmail'");
      while ($row = mysqli_fetch_array($dbQuery)) {
        $adminId = $row['AD_ID'];
      }

      $shopName = $_POST['sname'];
      $shopEmail = $_SESSION['Email'];
      $shopContact = $_POST['scontact'];
      $shopAddress = $_POST['saddress'];
      $shopPincode = $_POST['pincode'];
      $shopLandmark = $_POST['landmark'];
      $password = $_POST["password"];

      $dbQuery = "INSERT INTO `shop`(`userId`, `ShopeName`,`shopEmail`, `PhomeNo`,`Address`, `pinCode`, `landmark`) VALUES ($adminId,'$shopName','$shopEmail',$shopContact,'$shopAddress',$shopPincode,'$shopLandmark')";
      if (mysqli_query($db,$dbQuery)) {
        $dbQuery = "INSERT INTO `login`(`AD_ID`,`email`, `password`, `roleId`) VALUES ('$adminId','$sessionEmail','$password',2)";
        if (mysqli_query($db,$dbQuery)) {
          unset($_SESSION['Email']);
          unset($_SESSION['contact']);
          session_destroy();
          echo '<script>alert("Shop Registered Successfully");</script>';
          echo '<script>window.location="index.php";</script>';
        }else {
          echo 'sssssssssssssssss1';
        }
      } else {
        echo 'sssssssssssssssss';
      }
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Register</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <script src="https://kit.fontawesome.com/c19962bd3a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <style type="text/css">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Create an account</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
          <div class="card bg-secondary border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <medium>Shop Details</medium><br>
                <small>Sign up with credentials</small>
              </div>
              <form role="form" method = "POST" name="mkreg2">

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Name" name = "sname" type="text">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Number" name = "scontact" type="number">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Password" name="password" type="password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input class="form-control" placeholder="Confirm Password" name="cpassword" type="password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                      </div>
                      <textarea class="form-control" placeholder="Shop Address" name="saddress" rows="4"></textarea>
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-landmark"></i></span>
                      </div>
                      <input class="form-control" placeholder="Landmark" name = "landmark" type="text">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input class="form-control" placeholder="Pincode" name="pincode" type="number">
                    </div>
                  </div>
                </div>
                
                <!-- <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div> -->

                <div class="text-center">
                  <input type="submit" name="submit" class="btn btn-primary mt-4" value="Register" onclick="return reg1_validate()">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a class="font-weight-bold ml-1" target="_blank">Creative Team</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script type="text/javascript">
    function reg1_validate(){
      var Name = document.forms["mkreg2"]["sname"].value;
      var Contact = document.forms["mkreg2"]["scontact"].value;
      var Password = document.forms["mkreg2"]["password"].value;
      var CPassword = document.forms["mkreg2"]["cpassword"].value;
      var Paddress = document.forms["mkreg2"]["saddress"].value;
      var Landmark = document.forms["mkreg2"]["landmark"].value;
      var Pinc = document.forms["mkreg2"]["pincode"].value;

      if(Name == ""){
        alert("Enter the Shop Name!");
        return false;
      }
      if(Contact == ""){
        alert("Enter the Shop Number!");
        return false;
      }
      if(Contact.length > 10 || Contact.length < 10){
        alert("Enter the proper Number!");
        return false;
      }
      if(Password == ""){
        alert("Enter Password");
        return false;
      }
      if(CPassword == ""){
        alert("Enter confirm Password");
        return false;
      }
      if(CPassword != Password){
        alert("Enter same Password and Confirm Password");
        return false;
      }
      if(Paddress == ""){
        alert("Enter the Shop Address!");
        return false;
      }
      if(Landmark == ""){
        alert("Enter Lankmark");
        return false;
      }
      if(Pinc == ""){
        aletr("Enter Pin");
        return false;
      }
      if(Pinc.length != 6){
        alert("Enter Proper Pincode");
        return false;
      }
      return true;
    }
  </script>
</body>

</html>