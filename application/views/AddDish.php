<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ajouter plat| Admin </title>
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
      Trim Life Admin: Ajouter un Plat
    </h1>
  </div>
</nav>
    <div class="container">
      <div class="text"></div>
      <div class="text-center" style="color:#0d6efd;"><p class="h2"> Ajouter un Plat </p> </div>
      <div class="my-4"></div>
      <center>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nomPlat" class="form-label"> Nom du plat </label>
              <input type="text" class="form-control" id="nomPlat" name="nomPlat" placeholder="inserez le nom du plat" required>
              <div class="invalid-feedback">
                Veuillez entrer un nom valide.
              </div>
            </div>
    
            <div class="col-sm-6">
              <label for="regime" class="form-label">Categorie</label>
              <select class="form-select" id="regime" name="regime" required>
                <option value="">Choisir une categorie ...</option>
                <option value="1">petit déjeunée</option>
                <option value="2">déjeunée</option>
                <option value="3">collation</option>
                <option value="4">Diner</option>
              </select>
              <div class="invalid-feedback">
                Choisissez un regime.
              </div>
            </div>
            <div class="col-12">
                <label class="form-label" for="customFile"> Image </label>
                <input type="file" class="form-control form-select" id="customFile" required>
                <div class="invalid-feedback">
                  Choisissez un fichier s'il vous plait
                </div>
          </div>
            
            </div>
          <center>
          <button class=" btn btn-outline-success btn-lg" type="submit"> Valider </button>
          </center>
        </form>
      </div>
    </center>
      </div>
  </section>
  
  <script src="<?php echo base_url();?>/assets/js/Home.js"></script>
  <script src="<?php echo base_url();?>/assets/js/form-validation.js"></script>

</body>
</html>
