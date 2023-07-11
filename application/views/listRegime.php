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
        <a href="./AddRegime.html">
          <button type="button" name="ajouter" id="ajouter" class="btn btn-success">
            Nouveau régime 
          </button>
          </a>
    </div>
    <div class="my-4"></div>
        <div class="text-center">
            <table class="table" style="font-size: 15px" width="65%">
          <thead style="background-color:#0d6efd; color: white;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du régime</th>
            <th scope="col"> </th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th scope="row">1</th>
            <td>100% Sans glutene</td>
            <td>
                <a href="#"><input type="button" value="Supprimer" name="Supprimer" id="refuser" class="btn btn-outline-danger"></a>
                <a href="./updateRegime.html"><input type="button" value="modifier" name="modifier" id="modifier" class="btn btn-outline-warning"></a>
                <a href="#"><input type="button" value="details" name="details" id="details" class="btn btn-outline-info"></a>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>regime speciale carnivore</td>
            <td>
                <a href="#"><input type="button" value="Supprimer" name="Supprimer" id="refuser" class="btn btn-outline-danger"></a>
                <a href="./updateRegime.html"><input type="button" value="modifier" name="modifier" id="modifier" class="btn btn-outline-warning"></a>
                <a href="#"><input type="button" value="details" name="details" id="details" class="btn btn-outline-info"></a>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>regime vegetarien</td>
            <td>
                <a href="#"><input type="button" value="Supprimer" name="Supprimer" id="refuser" class="btn btn-outline-danger"></a>
                <a href="./updateRegime.html"><input type="button" value="modifier" name="modifier" id="modifier" class="btn btn-outline-warning"></a>
                <a href="#"><input type="button" value="details" name="details" id="details" class="btn btn-outline-info"></a>
            </td>
          </tr>
          </tbody>
        </table>
        </div>
      </div>
  </section>

  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>

</body>
</html>
