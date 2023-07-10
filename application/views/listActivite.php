<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Liste Activite | Admin </title>
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
    <h1 class="d-flex align-items-center fs-4 text-white mb-0">
      Trim Life Admin: Liste des Activités
    </h1>
  </div>
</nav>
    <div class="container">
      <div class="text"></div>
      <div class="text-center" style="color:#0d6efd;"><p class="h2" >Liste des Activités</p></div>
      <div class="my-4">
        <div class="text-center">
        <a href=""><input type="button" value="Ajouter une Activité" name="ajouter" id="ajouter" class="btn btn-success"></a>
    </div>
    <div class="my-4"></div>
      <div class="text-center">
            <table class="table table-borderless">
          <thead style="background-color:#0d6efd; color: white;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom de l'Activité</th>
            <th scope="col">kcl depensée</th>
          </tr>
          </thead>
          <tbody class="table-dark">
          <tr>
            <th scope="row">1</th>
            <td>developer coucher</td>
            <td>12 kcl</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>marche a pied</td>
            <td>38 kcl</td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>velo electrique</td>
            <td>38 kcl</td>
          </tr>
          </tbody>
        </table>
        </div>
        <div class="text">
          vous verrez ici chers Administrateur la liste des Activité que nous proposons a nos utilisateur qui les suivent
          tout le long de leur parcours en fonction de ce qu'il ont choisi comme objectif et programme. 
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
