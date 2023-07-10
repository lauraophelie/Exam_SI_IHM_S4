
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Liste des codes</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="<?php echo base_url();?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/style/Home.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/style/profi.css">
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
      Trim Life : Liste des codes 
    </h1>
  </div>
</nav>
<div class="container">
<div class="profile-info"></div>
    </div>
    <div class="text-center"><p class="h2" >Liste de code</p></div>
    <div class="container">
      <div class="text-center">
            <table class="table table-borderless">
          <thead style="background-color:#0d6efd; color: white;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">code</th>
            <th scope="col">valeur</th>
            <th scope="col">Etat</th>
          </tr>
          </thead>
          <tbody class="table-dark">
          <tr>
            <th scope="row">1</th>
            <td>12112425454</td>
            <td>200.000 ar</td>
            <td>utiliser</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>12112425454</td>
            <td>500.000 ar</td>
            <td>en attente</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>12112425454</td>
            <td>600.000 ar</td>
            <td>non utiliser</td>
          </tr>
          </tbody>
        </table>
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

<script src="<?php echo base_url();?>/assets/js/Home.js"></script>

</body>
</html>
