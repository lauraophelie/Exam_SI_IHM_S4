<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo site_url('assets/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo site_url('assets/dist/css/login.css'); ?>">
    <title>Login & sign up</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-md-10 mx-auto col-lg-5">

            <section class="wrapper">
                <div class="form signup">
                  <header> Sign in </header>
                  <form action="<?php echo site_url('Controller_48h/sign_in'); ?>" method="post">
                    <input type="text" placeholder="Full name" name="sign_in_nom" required />
                    <input type="text" placeholder="Email address" name="sign_in_email" required />
                    <input type="password" placeholder="Password" name="sign_in_mdp" required />
                    <input type="submit" class="btn btn-outline-light" value="Signup" />
                  </form>
                </div>
          
                <div class="form login">
                  <header> Sign up </header>
                  <form action="<?php echo site_url('Controller_48h/login'); ?>" method="post">
                    <input type="text" placeholder="Email address" name="sign_up_email" required />
                    <input type="password" placeholder="Password" name="sign_up_mdp" required />
                    <a href="<?php echo site_url('Controller_48h/log_admin');?>" class="btn btn-light"> Admin </a>
                    <input type="submit" class="btn btn-outline-success" value="Login" />
                  </form>
                </div>
          
                <script src="<?php echo site_url('assets/dist/js/logSign.js'); ?>"></script>
              </section>
          </div>
        </div>
      </div>
    <!-- <form action="#" method="post"> -->
    <!-- </form> -->
</body>
</html>