<?php
$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/style/login.css">
    <title>Admin sign up</title>
</head>
<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Examen Mr Rojo</h1>
            <p class="col-lg-10 fs-4">
              Bienvenue dans l'espace administrateur. Prenez les commandes et gérez votre plateforme en toute simplicité.
            </p>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            <section class="wrapper">
              <div class="form signup">
                <header>Sign in</header>
                <form action="#" method="post">
                  <input type="text" placeholder="Email address" required />
                  <input type="password" placeholder="Password" required />
                  <input type="submit" class="btn btn-outline-light" value="Connect" />
                </form>
              </div>
        
              <div class="form login">
                <header>Welcome Admin</header>
              </div>
            </section>
          </div>
        </div>
      </div>
</body>
</html>