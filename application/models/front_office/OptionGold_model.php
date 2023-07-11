<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class OptionGold_model extends CI_Model {

        public function update_status_user($user) {
            $sql = "UPDATE utilisateur SET est_gold = TRUE WHERE id ='%s'";
            $sql = sprintf($sql, $user);
            $this->db->query($sql);
        }

        public function choose_options_gold($user, $option) {
            $sql = "INSERT INTO utilisateur_option_gold(utilisateur, option_gold) VALUES('%s', '%s')";
            $sql = sprintf($sql, $user, $option);
            $this->db->query($sql);
        }

        public function get_options_gold() {
            $sql = "SELECT * FROM option_gold ORDER BY id ASC";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function get_remise() {
            $sql = "SELECT * FROM remise_gold ORDER BY date_remise DESC LIMIT 1";
            $query = $this->db->query($sql);
            $result = $query->row_array();
            return $result;
        }
    }
?>