<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// var_dump($sport);
?><!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Modifier Activité | Admin </title>
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
      Trim Life Admin: Modifier l'Activité
    </h1>
  </div>
</nav>
    <div class="container">
      <div class="text-center" style="color:#0d6efd;"><p class="h2" >modifier une Activité</p></div>
      <div class="my-4"></div>
      <center>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-12">
              <label for="nom" class="form-label">Nom de l'Activité</label>
              <input type="text" class="form-control" value="nom de l'Activité" id="nom" name="nom" placeholder="inserez le nom du Regime" required>
              <div class="invalid-feedback">
                veuiller entrer un Nom d'Activité valide.
              </div>
            </div>
            <hr class="my-4">
          <center>
          <button class=" btn btn-outline-success btn-lg" type="submit">Ajouter le regime </button>
          </center>
        </form>
      </div>
    </center>
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
