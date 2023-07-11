<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $site_url = site_url();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/style/login.css'); ?>">
    <title>Admin sign up</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-md-10 mx-auto col-lg-5">
            <section class="wrapper">
              <div class="form signup">
                <header> Admin </header>
                <form action="<?php echo site_url('Controller_48h/log_admin');?>" method="post">
                  <input type="text" placeholder="Name" name="admin_nom" required />
                  <input type="email" placeholder="Email address" name="admin_email" required />
                  <input type="password" placeholder="Password" name="admin_mdp" required />
                  <input type="submit" class="btn btn-outline-light" value="Connect" />
                </form>
              </div>
        
              <div class="form login">
                <header> </header>
              </div>
            </section>
          </div>
        </div>
      </div>
</body>
</html>