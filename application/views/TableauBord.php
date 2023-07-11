<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Tableau de bord | Admin </title>
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
      Trim Life Admin: Tableau de Bord
    </h1>
  </div>
</nav>
<div class="text-center" style="color:#0d6efd;"><p class="h2" >Tableau de bord</p></div>
<div class="my-4">
<div class="container">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Regime 1</th>
            <th>Regime 2</th>
            <th>Regime 3</th>
            <th>Regime 4</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="col">Ventes</td>
            <td>120</td>
            <td>150</td>
            <td>180</td>
            <td>200</td>
          </tr>
          <tr>
            <td>Revenus</td>
            <td>1000</td>
            <td>1200</td>
            <td>1500</td>
            <td>2000</td>
          </tr>
        </tbody>
      </table>
    <div class="container">
        <div class="row h-100">
        <canvas id="myChart"></canvas>
        </div>
    </div>
    <hr class="my-4">
    <div class="text-center"><p class="h4" style="color:#0d6efd;">Les plats de notre programes</p></div>
    <div class="text-center"><p class="h6">le nommbre de plat total est : 300</p></div>
    <div class="my-4"></div>
    <div class="row">
    <div class="col-md-6 col-lg-4 col-container"> <h5 class="text-center">plat a base de viande</h3> <canvas id="chart1" ></canvas></div>
    <div class="col-md-6 col-lg-4 col-container"><h5 class="text-center">plat a base de volaille</h3><canvas id="chart2" ></canvas></div>
    <div class="col-md-6 col-lg-4 col-container"><h5 class="text-center">plat a base de Poisson</h3><canvas id="chart3"></canvas></div>
</div>    
    <script src="<?php echo base_url(); ?>/assets/js/chart.js"></script>
    <script>
        // Données pour les graphiques
        var data = {
            datasets: [{
                data: [300, 100],
                backgroundColor: ['#36A2EB', '#FF6384']
            }]
        };
        var data2 = {
            datasets: [{
                data: [300, 150],
                backgroundColor: ['#36A2EB', '#ffc107']
            }]
        };
        var data3 = {
            datasets: [{
                data: [300, 200],
                backgroundColor: ['#36A2EB', '#198754']
            }]
        };

        // Options des graphiques
        var options = {
            responsive: true
        };

        // Création des graphiques
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'doughnut',
            data: data,
            options: options
        });

        var ctx2 = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: data2,
            options: options
        });

        var ctx3 = document.getElementById('chart3').getContext('2d');
        var chart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: data3,
            options: options
        });
    </script>
      <script src="<?php echo base_url(); ?>/assets/js/tableauBord.js"></script>
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

</body>
</html>
