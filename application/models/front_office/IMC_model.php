<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class IMC_model extends CI_Model {

        public function get_imc_user($user) {
            $sql = "SELECT * FROM v_imc_utilisateur WHERE utilisateur = '%s'";
            $sql = sprintf($sql, $user);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }

        public function get_imc_ideal($age, $genre) {
            $sql = "SELECT * FROM imc_ideal_utilisateur WHERE(genre = '%s' AND age_min <= %d AND age_min >= %d)";
            $sql = sprintf($sql, $genre, $age, $age);
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
    }
?>