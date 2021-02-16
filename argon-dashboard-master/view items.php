<?php 
include 'config.php';
    session_start();
    if(!isset($_SESSION["Email"])) {
      header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>View Items</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> -->
</head>

<body>
  <!-- Sidenav -->
  <?php 
    include("sidebar.php");
    include("header.php"); 
    $shopId = $_GET['id'];
  ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">View Items</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="add product.php?id=<?php echo $shopId;?>" class="btn btn-sm btn-neutral">Add Product</a>
              <a href="add category.php?id=<?php echo $shopId;?>" class="btn btn-sm btn-neutral">Add Product Category</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="mytable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.NO</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Summary</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php 
                   
                    $dbQuery = mysqli_query($db,"SELECT `product`.`productName`,`product`.`ProductDesc`,`product`.`ProductSummary`,`product`.`Price`,`product`.`DiscountPrice`,`product`.`ProductCategoryId`,`productcategory`.`Name` FROM `product` LEFT JOIN `productcategory` ON `productcategory`.`ProductCategoryID`=`product`.`ProductCategoryId` WHERE `product`.`shopId` = '$shopId' AND `productcategory`.`shopId` = '$shopId'");
                    $count = 1;
                    if (mysqli_num_rows($dbQuery) == 0) {
                      echo "<script>alert('No Shope');  </script>";
                    } else {
                      while ($row = mysqli_fetch_array($dbQuery)) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['productName'];?></td>
                        <td><?php echo $row['ProductDesc'];?></td>
                        <td><?php echo $row['ProductSummary'];?></td>
                        <td><?php echo $row['Price'];?></td>
                        <td><?php echo $row['DiscountPrice'];?></td>
                        <td><?php echo $row['Name'];?></td>
                        <td>Edit</td>
                    </tr>
                    <?php 
                    $count++;
                      }
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sr.NO</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Summary</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
      <!-- <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Dark table</h3>
            </div>
            <div class="table-responsive">
              <table id="mytable" class="table align-items-center table-flush">
                  <tr class="header">
                    <th style="width:60%;">Name</th>
                    <th style="width:40%;">Country</th>
                  </tr>
                  <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Germany</td>
                  </tr>
                  <tr>
                    <td>Berglunds snabbkop</td>
                    <td>Sweden</td>
                  </tr>
                  <tr>
                    <td>Island Trading</td>
                    <td>UK</td>
                  </tr>
                  <tr>
                    <td>Koniglich Essen</td>
                    <td>Germany</td>
                  </tr>
                  <tr>
                    <td>Laughing Bacchus Winecellars</td>
                    <td>Canada</td>
                  </tr>
                  <tr>
                    <td>Magazzini Alimentari Riuniti</td>
                    <td>Italy</td>
                  </tr>
                  <tr>
                    <td>North/South</td>
                    <td>UK</td>
                  </tr>
                  <tr>
                    <td>Paris specialites</td>
                    <td>France</td>
                  </tr>
                </table>
            </div>
          </div>
        </div>
      </div> -->
      <!-- Footer -->
      <?php include("footer.php"); ?>
    </div>
  </div>

  <script type="text/javascript">
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myinput");
      filter = input.value.toUpperCase();
      table = document.getElementById("mytable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }        
      }
    }

    $(document).ready(function() {
        $('#mytable').DataTable();
    } );
  </script>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <!-- <script src="assets/js/jquery-3.5.1.js"></script>
  <script src="assets/js/jquery.dataTables.mim.js"></script>
  <script src="assets/js/dataTables.bootstrap4.mim.js"></script> -->
 <!--  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script> -->
</body>

</html>