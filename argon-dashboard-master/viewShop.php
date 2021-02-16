<?php 
include 'config.php';
session_start();
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
  ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">View Shop</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="" class="btn btn-sm btn-neutral">Add Shop</a>
              <!-- <a href="add category.php" class="btn btn-sm btn-neutral">Add Product Category</a> -->
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
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody> 
                <?php 
                 $id = $_SESSION['ID'];
                 $dbQuery = mysqli_query($db,"SELECT * FROM `shop` WHERE `userId` = $id");
                $count = 1;
             if (mysqli_num_rows($dbQuery) == 0) {
                 echo "<script>alert('No Shope');  </script>";
             } else {
                 while ($row = mysqli_fetch_array($dbQuery)) {
            ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['ShopeName'];?></td>
                        <td><a href= "view%20items.php?id=<?php echo $row['ShopId']?>">View Product</td>
                    </tr>
                <?php
                $count++; 
            }
        }
            ?>
                </tbody>
                <tfoot>
                <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            </div>
          </div>
        </div>
      </div>
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