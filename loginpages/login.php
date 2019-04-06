<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>Home - Contadel</title>

      <!-- Stylesheets -->
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
      <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
      <!-- End of stylesheets -->
  </head>

  <!-- Content -->
  <body>
      <main class="page lanidng-page">
          <!-- Start of Navigation bar -->
          <section class="portfolio-block block-intro">
              <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
                  <div class="container"><a class="navbar-brand logo" href="#">Contadel</a><button class="navbar-toggler"
                          data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle
                              navigation</span><span class="navbar-toggler-icon"></span></button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="nav navbar-nav ml-auto">
                              <li class="nav-item" role="presentation"><a class="nav-link active"
                                      href="../index.html">Home</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link"
                                      href="login.php">Login</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link"
                                      href="register.php">Sign up</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link" href="../hire-me.html">Contact</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
              <!-- End of Navigation bar -->

              <div class="container">
                <!-- Outer Row -->
                <div class="row justify-content-center" >
                    <div class="card o-hidden border-0 shadow-lg my-5">
                      <div class="card-body p-0" >
                        <!-- Nested Row within Card Body -->
                        <div class="container" >
                          <div class="container" style="width: 520px">
                            <div class="p-5">
                              <!-- Begin Card text -->
                              <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                              </div>
                              <!-- End of card text -->
                              <!-- User entry form -->
                              <form action="includes/login.inc.php" method="post" class="user">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-user" name="Username" placeholder="Enter Username or Email">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control form-control-user" name="Password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                  <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                  </div>
                                </div>
                                <button name="login-submit" class="btn btn-primary btn-user" type="submit">Login</button>
                              </form>
                              <!-- End of entry form -->
                              <hr>
                              <!-- Links to create or log into account -->
                              <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                              </div>
                              <div class="text-center">
                                <a class="small" href="register.html">Create an Account!</a>
                              </div>
                              <!-- End of links to create or log into account -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of card body-->
                    </div>
                  </div>
                </div>
            </section>

      <!-- Footer -->
       <footer class="page-footer">
         <div class="container">
           <div class="links"><a href="#">About us</a><a href="#">Contact&nbsp;</a><a href="#"></a></div>
           <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a>
             <a href="#"><i class="icon ion-social-instagram-outline"></i></a>
             <a href="#"><i class="icon ion-social-twitter"></i></a>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </main>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <!-- End of scripts -->

  </body>
</html>
