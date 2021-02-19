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
              <form role="form">

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                      </div>
                      <input class="form-control" placeholder="GSTIN Registration Number" type="number">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                      </div>
                      <input class="form-control" placeholder="Business Type" type="text">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-trademark"></i></span>
                      </div>
                      <input class="form-control" placeholder="Trade Name" type="text">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
                      </div>
                      <input class="form-control" placeholder="Trade number" type="number">
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Registration Date:</span>
                      </div>
                      <input class="form-control" placeholder="Registration Date" type="date">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-i-cursor"></i></span>
                      </div>
                      <input class="form-control" placeholder="GST type" type="text">
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                      </div>
                      <input class="form-control" placeholder="Fassi Name" type="text">
                    </div>
                  </div>  
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                      </div>
                      <input class="form-control" placeholder="Fassi Number" type="number">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Fassi Expiry:</span>
                      </div>
                      <input type="date" class="form-control" placeholder="Fassi Expiry">
                    </div>
                  </div>  
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                      </div>
                      <textarea class="form-control" placeholder="Address on Fassi" rows="4"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i>&nbsp;Business Aadhar Card</span>
                      </div>
                      <input class="form-control" placeholder="Business Aadhar Card" type="file">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-id-card"></i>&nbsp;Business Pan Card</span>
                      </div>
                      <input class="form-control" placeholder="Business Pan Card" type="file">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-file-image"></i>&nbsp;Fassi Certificate</span>
                      </div>
                      <input class="form-control" placeholder="Fassi Certificate" type="file">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label style="padding-left: 2%;">Open on:</label>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Monday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Tuesday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Wednesday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Thursday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Friday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label style="padding-left: 8%;"></label>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Saturday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Sunday" aria-label="Text input with checkbox">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label style="padding-left: 2%;">Delivery Type:</label>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="Self Delivery" aria-label="Text input with checkbox">
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" value="App Delivery" aria-label="Text input with checkbox">
                    </div>
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="button" class="btn btn-primary mt-4">Register</button>
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