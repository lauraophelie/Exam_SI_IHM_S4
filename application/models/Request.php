<?php
    class Request extends CI_Model{

        public function getValues($table){
            $query = $this->db->get($table);
            return $query->result();

        }
    }