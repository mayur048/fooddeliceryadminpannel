<?php
   include("config.php");
   session_start();
   $sessionEmail = $_SESSION['Email'];
   $dbQuery = mysqli_query($db,"SELECT `userId` FROM `shop` WHERE `userId` IN (SELECT `AD_ID` FROM `admindetails` WHERE `AD_Email`='$sessionEmail')");  
   if (mysqli_num_rows($dbQuery) == 0) {
    echo "<script>alert('No Shop');  </script>";
  } else {
    $row = mysqli_fetch_array($dbQuery);
    $id = $row['userId'];
  }
   if (isset($_POST['submit'])) {
     $gstNumber = $_POST['gstNumber'];
     $businessType = $_POST['businessType'];
     $tradeName = $_POST['tradeName'];
     $tradeNumber = $_POST['tradeNumber'];
     $regDate = $_POST['regDate'];
     $gstType = $_POST['gstType'];
     $fassiName = $_POST['fassiName'];
     $fassiNumber = $_POST['fassiNumber'];
     $fasseiExpiry = $_POST['fasseiExpiry'];
     $fassiAddress = $_POST['fassiAddress'];
     $aadharcard = $_FILES['aadharcard']['name'];
     $panCard = $_FILES['panCard']['name'];
     $fassiCertificate = $_FILES['fassiCertificate']['name'];
     $password = $_POST['password'];
     $openOn = $_POST["monday"].",".$_POST["tuesday"].",".$_POST["wednesday"].",".$_POST["thursday"].",".$_POST["friday"].",".$_POST["saturday"].",".$_POST["sunday"];
     $deliveryType = $_POST["shopDelivery"].",".$_POST["appDelivery"];

     $targetDir = "files/Document/";

     $aadharcardFile = $targetDir.basename($aadharcard);
     $panCardFile = $targetDir.basename($panCard);
     $fassiCertificateFile = $targetDir.basename($fassiCertificate);

     $uploadOk = 1;

     $aadharcardFileType = strtolower(pathinfo($aadharcardFile,PATHINFO_EXTENSION));
     $panCardFileType = strtolower(pathinfo($panCardFile,PATHINFO_EXTENSION));
     $fassiCertificateFileType = strtolower(pathinfo($fassiCertificateFile,PATHINFO_EXTENSION));

    //  $aadharcardCheck = getimagesize($_FILES['aadharcard']['tmp_name']);
    //  $panCardFileCheck = getimagesize($_FILES['panCard']['tmp_name']);
    //  $fassiCertificateCheck = getimagesize($_FILES['fassiCertificate']['tmp_name']);

    //  if ($aadharcardCheck !== false && $panCardFileCheck !== false && $fassiCertificateCheck !== false) {
    //   $message = "File is an image - ".$check['mime'].".";
    //   echo "<script>alert('$message');</script>";
    //   $uploadOk = 1;
    // } else {
    //   $message = "File is not an image.";
    //   echo "<script>alert('$message');</script>";
    //   $uploadOk = 0;
    // }

    if (file_exists($aadharcardFile)) {
      $message = "Sorry, aadharcard already exists.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if (file_exists($panCardFile)) {
      $message = "Sorry, panCard already exists.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if (file_exists($fassiCertificateFile)) {
      $message = "Sorry, fassiCertificate already exists.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if ($_FILES['aadharcard']['size'] > 500000 && $_FILES['panCard']['size'] > 500000 && $_FILES['fassiCertificate']['size'] > 500000  ) {
      $message = "Sorry, your file is too large";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if($aadharcardFileType != "jpg" && $aadharcardFileType != "png" && $aadharcardFileType != "jpeg" && $aadharcardFileType != "gif" ) {
      $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if($panCardFileType != "jpg" && $panCardFileType != "png" && $panCardFileType != "jpeg" && $panCardFileType != "gif" ) {
      $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if($fassiCertificateFileType != "jpg" && $fassiCertificateFileType != "png" && $fassiCertificateFileType != "jpeg" && $fassiCertificateFileType != "gif" ) {
      $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo '<script>alert("Sorry, your file was not uploaded.");</script>';
      // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES['aadharcard']['tmp_name'], $aadharcardFile) && move_uploaded_file($_FILES['panCard']['tmp_name'], $panCardFile) && move_uploaded_file($_FILES['fassiCertificate']['tmp_name'], $fassiCertificateFile)) {
        $dbQuery = "INSERT INTO `documents`(`userId`, `GSTINregNO`, `businessType`, `tradeName`, `tradeNumber`, `registrationDate`, `GSTType`, `fassiName`, `fassiNumber`, `fassiExpiry`, `AddressOnFassi`, `businessAadharCard`, `businessPanCard`, `fassiCertificate`, `openOn`, `deliverType`) VALUES ($id,$gstNumber,'$businessType','$tradeName',$tradeNumber,'$regDate','$gstType','$fassiName',$fassiNumber,'$fasseiExpiry','$fassiAddress','$aadharcardFile','$panCardFile','$fassiCertificateFile','$openOn','$deliveryType')";
        if (mysqli_query($db,$dbQuery)) {
          $dbQuery = "INSERT INTO `login`(`email`, `password`, `roleId`) VALUES ('$sessionEmail','$password',2)";
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
        // echo "The file ". htmlspecialchars( basename( $aadharcardFile)). " has been uploaded.";
        // echo "The file ". htmlspecialchars( basename( $panCardFile)). " has been uploaded.";
        // echo "The file ". htmlspecialchars( basename( $fassiCertificateFile)). " has been uploaded.";
      } else {
        // echo "Sorry, there was an error uploading your file.";
        echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
      }
    }

   }
  // }
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
        <div class="col-lg-12 col-md-10">
          <div class="card bg-secondary border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <medium>Documents</medium><br>
                <small>Sign up with credentials</small>
              </div>
              <form role="form" method = "POST" enctype="multipart/form-data" name="reg3">

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                      </div>
                      <input class="form-control" name="gstNumber" placeholder="GSTIN Registration Number" type="text">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                      </div>
                      <input class="form-control" name="businessType" placeholder="Business Type" type="text">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-trademark"></i></span>
                      </div>
                      <input class="form-control" name="tradeName" placeholder="Trade Name" type="text">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
                      </div>
                      <input class="form-control" name="tradeNumber" placeholder="Trade number" type="number">
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Registration Date:</span>
                      </div>
                      <input class="form-control" name="regDate" placeholder="Registration Date" type="date">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-i-cursor"></i></span>
                      </div>
                      <input class="form-control" name="gstType" placeholder="GST type" type="text">
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                      </div>
                      <input class="form-control" name="fassiName" placeholder="Fassi Name" type="text">
                    </div>
                  </div>  
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input class="form-control" name="fassiNumber" placeholder="Fassi Number" type="number">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Fassi Expiry:</span>
                      </div>
                      <input type="date" class="form-control" name="fasseiExpiry" placeholder="Fassi Expiry">
                    </div>
                  </div>  
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                      </div>
                      <textarea class="form-control" name="fassiAddress" placeholder="Address on Fassi" rows="4"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i>&nbsp;Business Aadhar Card</span>
                      </div>
                      <input class="form-control" name="aadharcard" placeholder="Business Aadhar Card" type="file">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i>&nbsp;Business Pan Card</span>
                      </div>
                      <input class="form-control" name="panCard" placeholder="Business Pan Card" type="file">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-image"></i>&nbsp;Fassi Certificate</span>
                      </div>
                      <input class="form-control" name="fassiCertificate" placeholder="Fassi Certificate" type="file">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i>&nbsp;</span>
                      </div>
                      <input class="form-control" name="password" placeholder="Password" type="password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label style="padding-left: 2%;">Open on:</label>&nbsp;&nbsp;
                  <!-- <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="monday" value="Monday" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Monday</label>
                      </div>&nbsp;&nbsp;
                   <!--  </div>
                  </div> -->
                  <!-- <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="tuesday" value="Tuesday" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Tuesday</label>
                      </div>&nbsp;&nbsp;
                     <!--  </div>
                    </div> -->
                  <!-- <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="wednesday" value="Wednesday" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Wednesday</label>
                      </div>&nbsp;&nbsp;
                    <!-- </div>
                  </div> -->
                  <!-- <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="thursday" value="Thursday" class="custom-control-input" id="customCheck4">
                        <label class="custom-control-label" for="customCheck4">Thursday</label>
                      </div>&nbsp;&nbsp;
                    <!-- </div>
                  </div> -->
                  <!-- <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="friday" value="Friday" class="custom-control-input" id="customCheck5">
                        <label class="custom-control-label" for="customCheck5">Friday</label>
                      </div>&nbsp;&nbsp;
                    <!-- </div>
                  </div> -->
                 <!--  <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="saturday" value="Saturday" class="custom-control-input" id="customCheck6">
                        <label class="custom-control-label" for="customCheck6">Saturday</label>
                      </div>&nbsp;&nbsp;
                    <!-- </div>
                  </div> -->
                  <!-- <div class="form-group col-md-2">
                    <div class="input-group"> -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="sunday" value="Sunday" class="custom-control-input" id="customCheck7">
                        <label class="custom-control-label" for="customCheck7">Sunday</label>
                      </div>&nbsp;&nbsp;
                    <!-- </div>
                  </div> -->

                <div class="col-md-12">
                  <div class="row">
                    <label style="padding-left: 2%;">Delivery Type:</label>&nbsp;&nbsp;
                    <!-- <div class="form-group col-md-2">
                      <div class="input-group"> -->
                        <div class="custom-control custom-checkbox">
                          <input type="radio" name="Delivery" value="Shop Delivery" class="custom-control-input" id="customCheck8" checked="false">
                          <label class="custom-control-label" for="customCheck8">Shop Delivery</label>
                        </div>&nbsp;&nbsp;
                      <!-- </div>
                    </div> -->
                    <!-- <div class="form-group col-md-2">
                      <div class="input-group"> -->
                        <div class="custom-control custom-checkbox">
                          <input type="radio" name="Delivery" value="App Delivery" class="custom-control-input" id="customCheck9">
                          <label class="custom-control-label" for="customCheck9">App Delivery</label>
                        </div>&nbsp;&nbsp;
                      <!-- </div>
                    </div> -->
                  </div>
                </div>
                
                <div class="col-md-2 offset-md-5">
                  <div class="row">
                    <div class="text-center">
                      <input type="submit" name="submit" class="btn btn-primary text-center mt-4" value="Register" onclick="return reg3_validate()">
                    </div>
                  </div>
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
    function reg3_validate(){
      var GSTIN = document.forms["reg3"]["gstNumber"].value;
      var gstinformat = /[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
      var Btype = document.forms["reg3"]["businessType"].value;
      var Tname = document.forms["reg3"]["tradeName"].value;
      var Tnum = document.forms["reg3"]["tradeNumber"].value;
      var Regdate = document.forms["reg3"]["regDate"].value;
      var Gtype = document.forms["reg3"]["gstType"].value;
      var Fname = document.forms["reg3"]["fassiName"].value;
      var Fnum = document.forms["reg3"]["fassiNumber"].value;
      var Fexpiry = document.forms["reg3"]["fasseiExpiry"].value;
      var Faddr = document.forms["reg3"]["fassiAddress"].value;
      var Aadhar = document.forms["reg3"]["aadharcard"].value;
      var Pan = document.forms["reg3"]["panCard"].value;
      var Fcerti = document.forms["reg3"]["fassiCertificate"].value;
      var Password = document.forms["reg3"]["password"].value;
      var Delivery = document.forms["reg3"]["Delivery"].value;
      
      var Monday = document.getElementById("customCheck1").checked;
      var Tuesday = document.getElementById("customCheck2").checked;
      var Wednesday = document.getElementById("customCheck3").checked;
      var Thursday = document.getElementById("customCheck4").checked;
      var Friday = document.getElementById("customCheck5").checked;
      var Saturday = document.getElementById("customCheck6").checked;
      var Sunday = document.getElementById("customCheck7").checked;
      

      if(GSTIN == ""){
        alert("Enter GSTIN Number!");
        return false;
      }
      if(!gstinformat.test(GSTIN)){
        alert("Enter Proper GSTN Number!");
        return false;
      }
      if(Btype == ""){
        alert("Enter Business Type!");
        return false;
      }
      if(Tname == ""){
        alert("Enter Trade Name!");
        return false;
      }
      if(Tnum == ""){
        alert("Enter Trade Number!");
        return false;
      }
      if(Regdate == ""){
        alert("Select GST Registration Date!");
        return false;
      }
      if(Gtype == ""){
        alert("Enter GST Type!");
        return false;
      }
      if(Fname == ""){
        alert("Enter Fassi Name!");
        return false;
      }
      if(Fnum == ""){
        alert("Enter Fassi Number!");
        return false;
      }
      if(Fexpiry == ""){
        alert("Select Fassi Date!");
        return false;
      }
      if(Faddr == ""){
        alert("Enter Fassi Address!");
        return false;
      }
      if(Aadhar == ""){
        alert("Upload Business Aadhar Card!");
        return false;
      }
      if(Pan == ""){
        alert("Upload Business Pan Card");
        return false;
      }
      if(Fcerti == ""){
        alert("Upload Fassi Certificate");
        return false;
      }
      if(Passowrd == ""){
        alert("Enter Password!");
        return false;
      }
      if(Password.length < 8){
        alert("Password should have 8 characters");
        return false;
      }
      if(monday=="false" && tuesday=="false" && wednesday=="false" && thursday=="false" && friday=="false" && saturday=="false" && sunday=="false"){
        alert("Select at least 5 days");
        return false;
      }
      if(Delivery ==""){
        alert("Selct Any One Delivery Type");
        return false;
      }
      return true;

    }
  </script>
</body>

</html>