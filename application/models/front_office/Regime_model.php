<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Regime_model extends CI_Model {

        public function get_regime($objectif) {
            $sql = "SELECT * FROM v_objectif_regime WHERE objectif_id = '%s'";
            $sql = sprintf($sql, $objectif);

            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }
        
        public function get_plats_regime($regime) {
            $sql = "SELECT * FROM v_regime_plat WHERE regime = '%s'";
            $sql = sprintf($sql, $regime);

            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function get_sports_regime($regime) {
            $sql = "SELECT * FROM v_regime_sport WHERE regime = '%s'";
            $sql = sprintf($sql, $regime);

            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function get_tarifs_regime($regime) {
            $sql = "SELECT * FROM v_tarifs_regime WHERE regime = '%s'";
            $sql = sprintf($sql, $regime);

            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }

        public function details_regime($regime) {
            $plats = $this->get_plats_regime($regime);
            $sports = $this->get_sports_regime($regime);
            $tarifs = $this->get_tarifs_regime($regime);

            $details = array(
                "plats" => $plats,
                "sports" => $sports,
                "tarifs" => $tarifs
            );
            return $details;
        }

        public function suggestions($objectif) {
            $regimes = $this->get_regime($objectif);
            $result = array();

            foreach($regimes as $regime) {
                $plats = $this->get_plats_regime($regime['regime_id']);
                $sports = $this->get_sports_regime($regime['regime_id']);

                $suggestions['regime'] = $regime;
                $suggestions['suggestion'] = array(
                    "plats" => $plats,
                    "sports" => $sports
                );
                array_push($result, $suggestions);
            }
            return $result;
        }
    }
?>