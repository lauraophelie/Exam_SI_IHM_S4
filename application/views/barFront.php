
    <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Trim life</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <!-- <ul class="navs-list"> -->
      <li>
        <a href="<?php echo base_url('Controller_48h/toHome');?>">
          <i class='bx bx-home' ></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
       <a href="<?php echo base_url('Controller_48h/toProfilUser');?>">
         <i class='bx bx-user' ></i>
         <span class="links_name">Mon profil</span>
       </a>
       <span class="tooltip">Mon Profil</span>
     </li>
     <li>
       <a href="<?php echo base_url('Controller_48h/toAddCompletion');?>">
         <i class='bx bx-list-plus' ></i>
         <span class="links_name">Ajouter Completion</span>
       </a>
       <span class="tooltip">Ajouter Completion</span>
     </li>
     <li>
      <a href="<?php echo base_url('Controller_48h/toWallet');?>">
        <i class='bx bx-wallet' ></i>
        <span class="links_name">Porte Feuille</span>
      </a>
      <span class="tooltip">Porte Feuille</span>
    </li>
    <li>
      <a href="<?php echo base_url('Controller_48h/toListCode');?>">
        <i class='bx bx-barcode' ></i>
        <span class="links_name">Liste code</span>
      </a>
      <span class="tooltip">Liste code</span>
    </li>
      <li class="profile" style="background-color: black;">
        <a href="<?php echo base_url('Controller_48h/logout');?>">
         <div class="profile-details">
           <div class="name_job">
             <div class="name">Log out</div>
             <div class="job">Examen Rojo</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" style="background-color: black;"></i>
         </a>
     </li>
    </ul>
  </div>