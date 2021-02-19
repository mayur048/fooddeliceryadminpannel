<?php 
  include 'config.php';
  $roleId = $_SESSION['Role'];
  $dbQuery =  mysqli_query($db,"SELECT * FROM `role` WHERE `RoleId` = $roleId");
  $dbResult = "";
  if (mysqli_num_rows($dbQuery) == 0) {
    $row = mysqli_num_rows($dbQuery);
    echo "<script>alert('$row');</script>";
    echo "<script>alert('NO ROLE HAS BEEN ASSIGNED TO YOU');</script>";
  } else {
    $dbResult = mysqli_fetch_assoc($dbQuery);
    $roleName = $dbResult['RoleName'];
    // echo "<script>alert('$message');</script>";
  }
?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <!-- <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">-->        
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <?php if ($dbResult['RoleName'] == 'super Admin') { ?> 
          <li class="nav-item">
            <a class="nav-link" href="view admin.php">
              <i class="fas fa-plus"></i>
              <span class="nav-link-text">View Admin</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="approveProducts.php">
              <i class="fas fa-check"></i>
              <span class="nav-link-text">Approve Products</span>
            </a>
          </li>
          <?php } else if ($dbResult['RoleName'] == 'admin') { ?>
          <li class="nav-item">
            <a class="nav-link" href="viewShop.php">
              <i class="fas fa-eye"></i>
              <span class="nav-link-text">View Shope</span>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>