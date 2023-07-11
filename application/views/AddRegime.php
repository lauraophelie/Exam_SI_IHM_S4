<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ajouter Regime | Admin </title>
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
      Trim Life Admin: Ajouter un Regime
    </h1>
  </div>
</nav>
    <div class="container">
      <div class="text"></div>
      <div class="text-center" style="color:#0d6efd;"><p class="h2" >Ajouter un Regime</p></div>
      <div class="my-4"></div>
      <center>
        <form class="needs-validation" novalidate>
      <div class="text-center" style="color:#0d6efd;"><p class="h2" >Modifier un Regime</p></div>
      <div class="my-4"></div>
      <center>
        <form class="needs-validation" action="<?php echo base_url('Controller_48h/createRegime'); ?>" method="post">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nom" class="form-label">Nom Regime</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="inserez le nom du Regime" required>
              <div class="invalid-feedback">
                veuiller entrer un Nom valide.
              </div>
            </div>
            <div class="col-sm-6">
              <label for="regimeType" class="form-label">type de regime</label>
              <select class="form-select" id="regimeType" name="regimeType" required>
                <option value="">Choisir un type regime ...</option>
                <option value="1">Regime minceur(Diminuer mon poids)</option>
                <option value="2">Regime grosseur(Augmenter mon poids)</option>
                <option value="3">Garde ma ligne Actuelle(ni mincir ni grossir)</option>
            <div class="col-sm-6">
              <label for="regimeType" class="form-label">Objectif Du Regime</label>
              <select class="form-select" id="regimeType" name="regimeType" required>
                <option value="">Choisir un objectif ...</option>
                <?php foreach($objectif as $o) { ?>
                <option value="<?php echo $o->objectif; ?>"><?php echo $o->o_d ;?></option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">
                veuiller entrer un Nom valide.
              </div>
            </div>
            <style>
            </style>
            <hr class="my-4">
            <div class="text-center" ><p class="h5" >choisir le(s) plat(s) qui compose le regime</p></div>
            <div class="col-12">
                <div class="row">
                  <div class="col-md-6 col-lg-4 col-container">
                    <img src="<?php echo base_url();?>/assets/img/profil.jpg" width="50%" class="img-fluid" alt="" srcset="">
                    <p>
                      <input type="checkbox" class="form-check-input" name="plat" id="plat">
                      <label class="form-check-label" for="plat"> plat 1</label>
                    </p>
                  </div>
                  <div class="col-md-6 col-lg-4 col-container">
                    <h3><img src="<?php echo base_url();?>/assets/img/profil.jpg"  width="50%" class="img-fluid" alt="" srcset=""></h3>
                    <p>
                      <input type="checkbox" class="form-check-input" name="plat" id="plat">
                      <label class="form-check-label" for="plat"> plat 2</label>
                    </p>
                  </div>
                  <div class="col-md-6 col-lg-4 col-container">
                    <h3><img src="<?php echo base_url();?>/assets/img/profil.jpg"  width="50%" class="img-fluid" alt="" srcset=""></h3>
                    <p>
                      <input type="checkbox" class="form-check-input" name="plat" id="plat">
                      <label class="form-check-label" for="plat"> plat 3</label>
                    </p>
                  </div>
                  <?php foreach($plat as $p) { ?>
                  <div class="col-md-6 col-lg-4 col-container">
                    <h3><img src="<?php echo base_url();?>/assets/img/profil.jpg"  width="50%" class="img-fluid" alt="" srcset=""></h3>
                    <p>
                      <input type="checkbox" class="form-check-input" value="<?php echo $p->id; ?>" name="plat[]" id="plat">
                      <label class="form-check-label" for="plat"><?php echo $p->designation; ?></label>
                    </p>
                  </div>
                  <?php } ?>
                  
                </div>
            </div>
            </div>
          <hr class="my-4">
          <div class="col-12">
            <div class="text-center" ><p class="h5" >choisir le(s) Activité(s) qui compose le regime</p></div>
            <input type="checkbox" class="form-check-input" name="plat" id="plat">
            <label class="form-check-label" for="plat"> course a pied</label>
            <input type="checkbox" class="form-check-input" name="plat" id="plat">
            <label class="form-check-label" for="plat"> Natation</label>
            <input type="checkbox" class="form-check-input" name="plat" id="plat">
            <label class="form-check-label" for="plat"> velo</label>
          </div>
          <hr class="my-4">
          <center>
          <button class=" btn btn-outline-success btn-lg" type="submit">Ajouter le regime </button>
          </center>
        </form>
      </div>
    </center>
            <hr class="my-4">
            <div class="col-12">
              <div class="text-center" ><p class="h5" >choisir le(s) Activité(s) qui compose le regime</p></div>
              <?php foreach($sport as $sp) { ?>
              <input type="checkbox" class="form-check-input" value="<?php echo $sp->id; ?>" name="sport[]" id="sport">
              <label class="form-check-label" for="sport"><?php echo $sp->designation ;?></label>
              <?php } ?>
            </div>
            <hr class="my-4">
            <center>
            <button class=" btn btn-outline-success btn-lg" type="submit">Ajouter le regime </button>
            </center>
          </form>
        </div>
      </center>
        </div>
          <div class="my-4">
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
  <script src="<?php echo base_url();?>/assets/js/form-validation.js"></script>

</body>
</html>
