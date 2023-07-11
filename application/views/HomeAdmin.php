<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();

// var_dump($waitingCode);
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Page d'acceuil | Admin </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="<?php echo base_url();?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/style/Home.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php $this->load->view('barBack') ;?>
  <!-- ato anatiny section no mapiditra anze zvt rht apidirina -->
  <section class="home-section">
    <nav class="bd-header bg-dark py-3 fixed d-flex align-items-stretch border-bottom border-dark">
  <div class="container-fluid d-flex align-items-center">
    <h1 class="d-flex align-items-center fs-5 text-white mb-0">
      Trim Life Admin: Page D'acceuil
    </h1>
  </div>
</nav>
    <div class="container">
      <!---<div class="text"></div>
      <div class="text-center" style="color:#0d6efd;"><p class="h2" >Liste demande Code</p></div>
      <div class="text-center">
            <table class="table table-borderless">
          <thead style="background-color:#0d6efd; color: white;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Code</th>
            <th scope="col">Confirmer/refuser</th>
          </tr>
          </thead>
          <tbody class="table-dark">
            <?php $i = 1; foreach($waitingCode as $values) { ?>
          <tr>
            <th scope="row"><?php echo $i; $i++; ?></th>
            <td><?php echo $values->nom;?></td>
            <td><?php echo $values->idcode;?></td>
            <td>
              <?php $idParam = $values->idcode; $idu = $this->session->userdata('id'); ?>
                <a href="<?php echo base_url('Controller_48h/validateCode') . "?idcode=" . $idParam . "&id=" . $idu;   ?>"><input type="button" value="Confirmer" name="confirmer" id="confirmer" class="btn btn-outline-success"></a>
                <a href="<?php echo base_url('Controller_48h/cancelCode') .'/'. $idParam; ?>"><input type="button" value="Refuser" name="refuser" id="refuser" class="btn btn-outline-danger"></a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>--->
      </div>
  </section>
  </div>
      </div>
  </section>

  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>

</body>
</html>
