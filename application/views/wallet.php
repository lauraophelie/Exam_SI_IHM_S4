<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
// echo $this->session->userdata('id');
// var_dump($this->session->userdata());
// var_dump($wallet);
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="<?php echo $base_url;?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/style/Home.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>/assets/style/profi.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php 
    $this->load->view('barFront');
  ?>
  <!-- ato anatiny section no mapiditra anze zvt rht apidirina -->
  <section class="home-section">
    <nav class="bd-header bg-dark py-3 fixed d-flex align-items-stretch border-bottom border-dark">
  <div class="container-fluid d-flex align-items-center">
    <h1 class="d-flex align-items-center fs-4 text-white mb-0">
      Trim Life : Mon Porte Feuille
    </h1>
  </div>
</nav>
<div class="container">
      <div class="profile-info">
    <div class="col-4">
      <div class="user-details">
        <h2><?php echo $wallet[0]->nom; ?></h2>
        <p>Mon compte: <?php echo $wallet[0]->valeur; ?> Ar</p>
      </div>
    </div>
</div>
</div>
    <center>
        <h4 class="mb-3" style="margin: 36px;color:#0d6efd;">Inserez code </h4>
        <form class="needs-validation" action="<?php echo base_url('Controller_48h/verifCode');?>" method="post">
            <div class="col-sm-6">
                <label for="code" class="form-label">Code</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" id="code"name="code" placeholder="xxx xxxx xxxx ..." required>
                <div class="invalid-feedback">
                    veuiller remplir le champ.
                  </div>
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $this->session->userdata('id');?>">
          <div class="my-4">
          <center>
          <button class=" btn btn-outline-success btn-lg" type="submit">Confirmer code</button>
          </center>
        </form>
      </div>
    </center>
  </section>
  <Script src="<?php echo base_url();?>/assets/js/form-validation.js"></Script>
  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>
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

  <script src="<?php echo base_url();?>/assets/style/Home.js"></script>

</body>
</html>
