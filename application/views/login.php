<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url();?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/login.css">
    <title>Login & sign up</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Examen Mr Rojo</h1>
            <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">

            <section class="wrapper">
                <div class="form signup">
                  <header>Sign in</header>
                  <form action="<?php echo base_url('Controller_48h/sign_in'); ?>" method="post">
                    <input type="text" placeholder="Full name" name="sign_in_nom" required />
                    <input type="text" placeholder="Email address" name="sign_in_email" required />
                    <input type="password" placeholder="Password" name="sign_in_mdp" required />
                    <input type="submit" class="btn btn-outline-light" value="Signup" />
                  </form>
                </div>
          
                <div class="form login">
                  <header>Sign up</header>
                  <form action="<?php echo base_url('Controller_48h/login'); ?>" method="post">
                    <input type="text" placeholder="Email address" name="sign_up_email" required />
                    <input type="password" placeholder="Password" name="sign_up_mdp" required />
                    <a href="<?php echo base_url('Controller_48h/admin');?>" class="btn btn-light">Sign in as an admin</a>
                    <a href="./forgotpassword.html">Forgot password?</a>
                    <input type="submit" class="btn btn-outline-success" value="Login" />
                  </form>
                </div>
          
                <script src="<?php echo base_url();?>/assets/dist/js/logSign.js"></script>
              </section>
          </div>
        </div>
      </div>
    <!-- <form action="#" method="post"> -->
    <!-- </form> -->
</body>
</html>