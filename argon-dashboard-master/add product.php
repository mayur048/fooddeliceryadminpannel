<?php 
    include("config.php");
    session_start();
  if (!isset($_SESSION["Email"])) {
    header("location: index.php");
  }
  $shopId = $_GET['id']; 
  if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productSummary = $_POST['productSummary'];
    $selectCategory = $_POST['selectCategory'];
    $productPrice = $_POST['productPrice'];
    $productDiscountPrice = $_POST['productDiscountPrice'];

    $productImg = $_FILES['productImg']['name'];
    $targetDir = "files/productImg/";
    $targetFile = $targetDir.basename($productImg);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES['productImg']['tmp_name']);
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

    if ($_FILES['productImg']['size'] > 500000) {
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
      if (move_uploaded_file($_FILES['productImg']['tmp_name'], $targetFile)) {
        $dbQuery = "INSERT INTO `product`( `productName`, `shopId`, `ProductDesc`, `ProductSummary`, `Price`, `DiscountPrice`, `ProductCategoryId`, `productImg`) VALUES ('$productName',$shopId,'$productDesc','$productSummary',$productPrice,'$productDiscountPrice',$selectCategory,'$targetFile')";
        if (mysqli_query($db,$dbQuery)) {
          echo '<script>alert("The file has been uploaded.");</script>';
        }
        // echo "The file ". htmlspecialchars( basename( $targetFile)). " has been uploaded.";
      } else {
        // echo "Sorry, there was an error uploading your file.";
        echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
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
  <title>Admin Panel</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <script src="https://kit.fontawesome.com/c19962bd3a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
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

<body>
  <!-- Sidenav -->
  <?php 
    include("sidebar.php");

    $dbQuery = mysqli_query($db,"SELECT * FROM `productcategory` WHERE `shopId` = $shopId");
    if (mysqli_num_rows($dbQuery) == 0) {
      echo "<script>alert('FYI:- No Product Category Available, Please Create One!!');window.location.replace('add category.php?id=$shopId');</script>";
    } else {
  ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <!-- <img alt="Image placeholder" src="assets/img/theme/team-4.jpg"> -->
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['Email'];?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Add Product</h3>
            </div>

            <form method="post" enctype="multipart/form-data">
              <div class="row" style="padding: 2%"> 

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control form-control-muted" name = "productName" placeholder="Product Name">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control form-control-muted" name = "productDesc" placeholder="Product Description">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group">
                      <textarea class="form-control form-control-muted" name = "productSummary" placeholder="Product Summary" rows="3"></textarea> 
                    </div>
                  </div>
                </div>

                <div class="col-md-6 ">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" name = "productImg" placeholder="Product Image">
                    <label class="custom-file-label form-control-muted" for="customFileLang">Select file</label>
                  </div>  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-control form-control-muted" name = "selectCategory">
                      <?php 
                        while ($rows = mysqli_fetch_array($dbQuery)) {?>
                          <option value="<?php echo $rows['ProductCategoryID']; ?>"><?php echo $rows['Name']; ?></option>
                      <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="number" class="form-control form-control-muted" name = "productPrice" placeholder="Product Price">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input type="number" class="form-control form-control-muted" name = "productDiscountPrice"  placeholder="Discounted Price">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 offset-md-5">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="submit" class="btn btn-primary" name = "submit" value="Submit">
                    </div>
                  </div>
                </div>

              </div>
            </form>

          </div>
        </div>
      </div>



    <!-- Footer -->
    <?php include("footer.php"); ?>

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>