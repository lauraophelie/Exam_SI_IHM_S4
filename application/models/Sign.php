<?php
    class Sign extends CI_Model{

        function verifLog($tab1){
            $tab_base = $this->getValeur();
            // var_dump($tab1);
            // var_dump($tab_base);
            for ($i=0; $i < count($tab_base); $i++) { 
                if($tab_base[$i]->email==$tab1['email'] && $tab_base[$i]->mdp==$tab1['mdp']){
                    return 1;
                }
            }
            return 0;
        }

        public function getValeur() {
            $query = $this->db->get('utilisateur');
            return $query->result();
        }
        
        public function getValues($table){
            $query = $this->db->get($table);
            return $query->result();

        } 

        function IsValuesNull($tab){
            foreach($tab as $value){
                if(empty($value)){
                    return 1;
                }
            }
            return 0;
        }

        function insertSign_in($data){
            $this->db->insert('utilisateur', $data);
            // echo $this->db->affected_rows();
            
            $id = $this->db->insert_id();
            $this->db->insert('porte_monnai',array( // creer un porte monnai pour le
                'idUser' => $id,                    // nouveau user
                'valeur' => 0
            ));
            return $this->db->insert_id();          // récupérer l'identifiant (ID) généré lors de l'insertion
                                                    // d'une nouvelle ligne dans une table de base de données à l'aide de CodeIgniter.

        }
    }
?>
