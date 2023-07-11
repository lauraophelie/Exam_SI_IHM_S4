<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Regime extends CI_Controller {
        public function get_regime() {
            $objectif = $this->input->post('objectif');
            $this->load->model('front_office/regime_model');
            $suggestions = $this->regime_model->get_regime($objectif);
            $data['suggestions'] = $suggestions;
            $this->load->view('front_office/suggestions_regime', $data);
        }
    }
?>