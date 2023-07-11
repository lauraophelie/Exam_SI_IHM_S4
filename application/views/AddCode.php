<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Page d'acceuil | Admin </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="<?php echo base_url(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/style/Home.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php $this->load->view('barBack') ;?>

  <!-- ato anatiny section no mapiditra anze zvt rht apidirina -->
  <section class="home-section">
    <nav class="bd-header bg-dark py-3 fixed d-flex align-items-stretch border-bottom border-dark">
  <div class="container-fluid d-flex align-items-center">
    <h1 class="d-flex align-items-center fs-4 text-white mb-0">
      Trim Life Admin: Ajouter un code pour les utilisateurs
    </h1>
  </div>
</nav>
    <div class="container">
      <div class="text"></div>
      <div class="text-center" style="color:#0d6efd;"><p class="h2" >Ajouter un code pour les utilisateurs</p></div>
      <div class="text-center">
        <form class="needs-validation" action="<?php echo base_url('Controller_48h/addNewCode'); ?>" method="post">
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="val" class="form-label">code (suite de chiffre)</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="inserez le code" required>
            <div class="invalid-feedback">
              veuiller entrer une suite de chiffre.
            </div>
          </div>
  
          <div class="col-sm-6">
            <label for="val" class="form-label">Valeur (en Arriary)</label>
            <input type="text" class="form-control" id="val" name="val" placeholder="inserez la valeur en Ariary" required>
            <div class="invalid-feedback">
              Veuillez inserez une valeur valide.
            </div>
          </div>
          </div>
          <div class="my-4"></div>
          <center>
            <input type="submit" value="Ajouter le nouveau code" class="btn btn-outline-success btn-lg">
          </center>
        </div>
      </div>
  </section>
  
<footer class="footer mt-auto py-3 bg-dark">
  <div class="container">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><div class="nav-link px-2 " style="color:#0d6efd;">Addresse: IT University, Antananarivo, Andoharanofotsy</div></li>
      <li class="nav-item"><div class="nav-link px-2 " style="color:#0d6efd;">Contact: +261 12 345 67</div></li>
      <li class="nav-item"><div class="nav-link px-2 " style="color:#0d6efd;">E-mail: Eemple@Gmail.Com</div></li>
    </ul>
    <p class="text-center " style="color:#0d6efd;">Examen S4 © 2023 IT University</p>
  </div>
</footer>

  <script src="<?php echo base_url(); ?>/assets/js/Home.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/form-validation.js"></script>

</body>
</html>
