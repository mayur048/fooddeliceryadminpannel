<?php
 session_start();
 include("config.php");
 if(!isset($_SESSION["Email"])) {
  header("location: index.php");
// echo "<script>alert(aa".session_id().");</script>";

}
// echo "<script>alert(aa".session_id().");</script>";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>View Admin</title>
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
                <h6 class="h2 text-white d-inline-block mb-0">View Admins</h6>
                <!-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tables</li>
                  </ol>
                </nav> -->
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral">Add Admin</a>
               <!--  <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
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
                        <th>Email</th>
                        <th>Phone.No</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                   $dbQuery = mysqli_query($db,"SELECT * From `admindetails` WHERE `roleId` = 2");
                   $count = 1;
                if (mysqli_num_rows($dbQuery) == 0) {
                 ?>
                    <tr>
                      <td colspan="3" class="text-center">No Data Found</td>
                    </tr>
                 <?php   
                 } else {
                   while ($row = mysqli_fetch_array($dbQuery)) {
                     if ($row['isActive'] == 0) {
                 ?>

                    <tr>
                        <td style="color: #f5365c;"><?php echo $count;?></td>
                        <td style="color: #f5365c;"><?php echo $row['AD_Name'];?></td>
                        <td style="color: #f5365c;"><?php echo $row['AD_Email'];?></td>
                        <td style="color: #f5365c;"><?php echo $row['AD_Contact'];?></td>
                        <td>
                           <a href="status.php?id=<?php echo $row['AD_ID'];?>&&status=<?php echo $row['isActive'];?>"><button class="btn btn-success"><i class="fa fa-check"></i> Active</button></a> 
                          <!--<a href="status.php?id=<?php echo $row['AD_ID'];?>&&status=<?php echo $row['isActive'];?>"><button class="btn btn-warning"><i class="fa fa-times"></i> Active</button></a>-->
                        </td>
                    </tr>
                    <?php
                     } else {
                       ?>
                        <tr>
                        <td style="color: #2dce89;"><?php echo $count;?></td>
                        <td style="color: #2dce89;"><?php echo $row['AD_Name'];?></td>
                        <td style="color: #2dce89;"><?php echo $row['AD_Email'];?></td>
                        <td style="color: #2dce89;"><?php echo $row['AD_Contact'];?></td>
                        <td>
                          <!--<a href="status.php?id=<?php echo $row['AD_ID'];?>&&status=<?php echo $row['isActive'];?>"><button class="btn btn-success"><i class="fa fa-check"></i> DeActive</button></a>-->
                           <a href="status.php?id=<?php echo $row['AD_ID'];?>&&status=<?php echo $row['isActive'];?>"><button class="btn btn-warning"><i class="fa fa-times"></i> DeActive</button></a> 
                        </td>
                    </tr>
                       <?php
                     }
                $count++; 
            }
        }
            ?>
                </tbody>
                <tfoot>
                    <tr>
                    <th>Sr.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone.No</th>
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