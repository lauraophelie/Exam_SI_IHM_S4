<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objectif extends CI_Controller {
        public function index() {
            $this->load->model('front_office/objectif_model');
            $data['choix_objectifs'] = $this->objectif_model->get_all_objectifs();
            $this->load->view('front_office/choix_objectifs', $data);
        }
    }
?>