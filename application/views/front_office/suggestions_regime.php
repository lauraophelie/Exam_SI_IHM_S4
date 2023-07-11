<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo site_url('assets/css/styles.min.css'); ?>"/>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-header-position="fixed">
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <?php foreach($suggestions as $suggestion) { ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                            Featured
                            </div>
                            <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $suggestion['nom_regime']; ?>
                            </h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo site_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/js/sidebarmenu.js'); ?>"></script>
  <script src="<?php echo site_url('assets/js/app.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
</body>

</html>

