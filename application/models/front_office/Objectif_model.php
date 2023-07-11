<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Objectif_model extends CI_Model {
        public function get_all_objectifs() {
            $query = $this->db->query("SELECT * FROM objectif ORDER BY id ASC");
            $result = $query->result_array();
            return $result;
        }
    }
?>