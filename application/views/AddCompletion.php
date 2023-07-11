<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ajouter ma completion </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/style/Home.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/style/profi.css">
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
      Trim Life : Ajouter une complétion
    </h1>
  </div>
</nav>
<div class="container">
    <center>
      <h4 class="mb-3" style="margin: 36px;color:#0d6efd;"> Ajouter ma complétion </h4>
      <form class="needs-validation" action="<?php echo base_url('Controller_48h/insertDetailUser'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $this->session->userdata('id');?>">

        <div class="row g-3">
          <div class="col-sm-6">
            <label for="taille" class="form-label"> Taille (en cm)</label>
            <input type="number" min="100" step="1" max="350" class="form-control" id="taille" name="taille" placeholder="Insérer votre taille" required>
            <div class="invalid-feedback">
              Veuillez entrer un poid valide.
            </div>
          </div>
  
          <div class="col-sm-6">
            <label for="pound" class="form-label">Poids (en kg)</label>
            <input type="number" step="1" max="635" class="form-control" id="pound" name="pound" placeholder="Insérer votre poids" required>
            <div class="invalid-feedback">
              Veuillez insérer un poid valide.
            </div>
          </div>
          <div class="col-sm-6">
            <label for="dtn" class="form-label">Date de Naissance</label>
            <input type="date" min="14" step="1" max="110" class="form-control" id="dtn" name="dtn" placeholder="Insérer votre date de naissance" required>
            <div class="invalid-feedback">
              Veuillez insérer une age valide.
            </div>
          </div>
          <div class="col-sm-6">
            <label for="sexe" class="form-label">Sexe</label>
            <select class="form-select" id="sexe" name="sexe" required>
              <option value=""> Choisir votre sexe </option>
              <option value="M"> Homme</option>
              <option value="F"> Femme</option>
            </select>
            <div class="invalid-feedback">
              Choisissez un sexe .
            </div>
          </div>  

          <!-- <div class="col-12">
            <label for="regime" class="form-label">Regime</label>
            <select class="form-select" id="regime" name="regime" required>
              <option value="">Choisir un regime ...</option>
              <?php  //foreach($allRegime as $valueReg) { ?>
              <option value="<?php// echo $valueReg->id;?>"><?php //echo $valueReg->designation;?></option>
              <?php  //} ?>
            </select>
            <div class="invalid-feedback">
              Choisissez un regime.
            </div>
          </div> -->

          <div class="col-12">
            <label for="objectif" class="form-label">Objectif</label>
            <select class="form-select" id="objectif" name="objectif" required>
              <option value=""> Choisir un objectif </option>
              <?php  foreach($allObjectif as $valueObj) { ?>
                <option value="<?php echo $valueObj->id; ?>">
                  <?php echo $valueObj->designation; ?>
                </option>
              <?php  } ?>
            </select>
            <div class="invalid-feedback">
              Choisissez un objectif.
            </div>
          </div>

          <center>
            <button class=" btn btn-outline-success btn-lg" type="submit"> Valider </button>
          </center>
      </form>
    </div>
  </center>
  <script src="<?php echo base_url();?>/assets/js/form-validation.js"></script>
  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>
</section>
  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>

</body>
</html>
