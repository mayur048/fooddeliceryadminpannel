<?php
  session_start();
  include('config.php');
  if (!isset($_SESSION['Email'])) {
    echo '<script>window.location="register_1.php";</script>';
  } else {
    if(isset($_POST['submit'])) {
      $sessionEmail = $_SESSION['Email'];
      $dbQuery = mysqli_query($db,"SELECT * FROM `admindetails` WHERE `AD_Email` = '$sessionEmail'");
      while ($row = mysqli_fetch_array($dbQuery)) {
        $adminId = $row['AD_ID'];
      }
      // echo $adminId;
      $shopName = $_POST['sname'];
      $shopType = $_POST['stype'];
      $shopEmail = $_POST['email'];
      $shopContact = $_POST['contact'];
      $state = $_POST['state'];
      $city = $_POST['city'];
      $shopAddress = $_POST['address'];
      $shopPincode = $_POST['pin'];
      $shopLandmark = $_POST['landmark'];
      $shopLicence = $_FILES['shop']['name'];
      $shopServices = $_POST['Sweets']." ,".$_POST['Bakery']." ,".$_POST['Juice']." ,".$_POST['others'];

      
      $targetDir = "files/Document/";
      $targetFile = $targetDir.basename($shopLicence);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

      $check = getimagesize($_FILES['shop']['tmp_name']);
    if ($check !== false) {
      $message = "File is an image - ".$check['mime'].".";
      echo "<script>alert('$message');</script>";
      $uploadOk = 1;
    } else {
      $message = "File is not an image.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }
    if (file_exists($targetFile)) {
      $message = "Sorry, File already exists.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if ($_FILES['shop']['size'] > 500000) {
      $message = "Sorry, your file is too large";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      echo "<script>alert('$message');</script>";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo '<script>alert("Sorry, your file was not uploaded.");</script>';
      // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES['shop']['tmp_name'], $targetFile)) {
        $dbQuery = "INSERT INTO `shop`(`userId`, `ShopeName`, `shopType`, `shopEmail`, `PhomeNo`, `state`, `city`, `Address`, `pinCode`, `landmark`, `shopLiscence`, `services`) VALUES ($adminId,'$shopName','$shopType','$shopEmail',$shopContact,'$state','$city','$shopAddress',$shopPincode,'$shopLandmark','$targetFile','$shopServices')";
        if (mysqli_query($db,$dbQuery)) {
          echo '<script>window.location="register_3.php";</script>';
        } else {
          echo 'sssssssssssssssss';
        }
        // echo "The file ". htmlspecialchars( basename( $targetFile)). " has been uploaded.";
      } else {
        // echo "Sorry, there was an error uploading your file.";
        echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
      }
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
        <div class="col-lg-12 col-md-10">
          <div class="card bg-secondary border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <medium>Shop Details</medium><br>
                <small>Sign up with credentials</small>
              </div>
              <form role="form" method="POST" enctype="multipart/form-data">

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Name" name="sname" type="text">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-store"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Type" name="stype" type="text">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Mail (if Any)" name="email" type="email">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop Contact" name="contact" type="number">
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-flag-usa"></i>  </span>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="state">
                        <option value="">------Select State------</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                      </div>
                      <input class="form-control" placeholder="Shop City" name="city" type="text">
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                      </div>
                      <textarea class="form-control" placeholder="Shop Addrress" name="address" rows="4"></textarea>
                    </div>
                  </div>  
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input class="form-control" placeholder="Postal Code" name="pin" type="number">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-landmark"></i></span>
                      </div>
                      <input type="text" class="form-control" name="landmark" placeholder="Landmark">
                    </div>
                  </div>  
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-image"></i>&nbsp;Shop Liscence</span>
                      </div>
                      <input class="form-control" placeholder="Shop Liscense" name="shop" type="file">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label style="padding-left: 2%;">Services:</label>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="Sweets" class="custom-control-input" value="Sweets" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Sweets</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="Bakery" class="custom-control-input" value="Bakery" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Bakery</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="Juice" class="custom-control-input" value="Juice" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Juice</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="others1" class="custom-control-input" value="others1" id="customCheck4">
                        <label class="custom-control-label" for="customCheck4">Others</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <input type="text" class="form-control" name="others" placeholder="others">
                    </div>
                  </div>
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-primary mt-4" name = "submit" value = "Save and Continue" >
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
</body>

</html>