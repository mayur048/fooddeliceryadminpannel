<?php 
  session_start();
  include('config.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Verify Products</title>
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
    $dbQuery = mysqli_query($db,"SELECT * FROM `product` WHERE `status` = 'pending'");
   ?>
  <!-- Main content -->

    <!-- Header -->
    <!-- Header -->
    <div class="main-content" id="panel">
    <?php include("header.php");?>
      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Verify Products</h6>
                <!-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tables</li>
                  </ol>
                </nav> -->
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
              <h3 class="mb-0">Products table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="mytable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr.NO</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                  $count = 1;
                  if (mysqli_num_rows($dbQuery) == 0) {?>
                    <tr>
                    <td colspan="3" class="text-center">No Data Found</td>
                  </tr>
               <?php   
               } else {
                 while ($row = mysqli_fetch_array($dbQuery)) {
               
                ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['productName'];?></td>
                        <td><?php echo $row['ProductDesc'];?></td>
                        <td><?php echo $row['Price'];?></td>
                        <td><?php echo $row['DiscountPrice'];?></td>
                        <td><a href="<?php echo $row['productImg'];?>" target="_blank">View File</a></td>
                        <td>
                          <a href="status.php?id=<?php echo $row['productId'];?>&&status=Approve"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
                          <a href="status.php?id=<?php echo $row['productId'];?>&&status=Reject"><button class="btn btn-warning"><i class="fa fa-times"></i></button></a>
                        </td>
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
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
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