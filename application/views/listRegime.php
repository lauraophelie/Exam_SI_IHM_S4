<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Liste Regime | Admin </title>
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
    <h2 class="d-flex align-items-center fs-5 text-white mb-0">
      Back office : Liste des Régimes
    </h2>
  </div>
</nav>
    <div class="container">
      <div class="my-4">
        <div class="text-center">

        <a href="<?php echo base_url('Controller_48h/toAddRegime');?>"><input type="button" value="Ajouter un regime" name="ajouter" id="ajouter" class="btn btn-success"></a>
    </div>
    <div class="my-4"></div>
        <div class="text-center">
            <table class="table table-borderless">
          <thead style="background-color:#0d6efd; color: white;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du regime</th>
            <th scope="col"> -- </th>
          </tr>
          </thead>
          <tbody class="table-dark">

            <?php $i =1; foreach($regime as $r) { ?>
          <tr>
            <th scope="row"><?php echo $i; $i++; ?></th>
            <td><?php echo $r->designation ; ?></td>
            <td>
                <a href="<?php echo base_url('Controller_48h/supReg?id='); echo $r->id ;?>"><input type="button" value="Supprimer" name="Supprimer" id="refuser" class="btn btn-outline-danger"></a>
                <a href="<?php echo base_url('Controller_48h/toUpdateRegime?id='); echo $r->id ;?>"><input type="button" value="modifier" name="modifier" id="modifier" class="btn btn-outline-warning"></a>
                <a href="#"><input type="button" value="details" name="details" id="details" class="btn btn-outline-info"></a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
        <!-- <div class="text">
          vous verrez ici chers Administrateur la liste des regimes diponible vous pouvez ajouter,
          supprimer, modifier et voir les details des regimes comme bon vous le semble. 
        </div> -->
      </div>
  </section>
 
  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>

</body>
</html>
