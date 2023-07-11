<?php
    class Sign extends CI_Model{

        function siCodeExist($code){
            $this->db->select('*');
            $this->db->from('code');
            $this->db->where('idcode', $code);
            $resultat = $this->db->get()->result();
            // var_dump($resultat);
            if($code!="" && !empty($resultat)){         // continu si tous les valeurs ne sont pas nulles
                foreach($resultat as $codeVal){
                    if($code==$codeVal->idcode){
                        return 1;                       // return 1 si le code existe
                    }
                    else return 0;                      // return 0 si le code n'existe pas
                }
            }
            else{
                return -1;                              // return -1 si une des valeurs est nulles
            }
        }

        function codeInBase($id,$code){
            // echo $id." : ".$code;
            $codes = $this->getValues('code_user');
            foreach ($codes as $value) {
                // echo $value->idcode."--".$value->iduser."<br>";
                // echo $code."--".$id."<br><br>";
                if($value->idcode==$code && $value->iduser==$id){
                    return 1;                                   // si dans la base(iduser, idcode)
                }
            }
            return 0;                                           // sinon
        }

        function addCode_user($tab){
            $this->db->insert('code_user', $idCode);
            $this->db->insert('code_user', $idCode);
        }

        function waitStatusCode($code,$idUser){   
            $tab = array(
                'idcode' => $code,
                'iduser' => $idUser
            );
            $inbase = $this->codeInBase($idUser,$code);
            // echo "inbase = ".$inbase;
            if($inbase==0){                                 // si pas dans basse
                $this->myInsert('code_user',$tab);          // inserer valeur dans table code_user
            }
            // echo $code;
            $this->db->where('idcode', $code);
            $this->db->update('code', array('etat' => 0));
        }

        function getId($prefixe){
            $id = $this->db->insert_id();
            return $prefixe.$id;
        }

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

        public function getCond($table,$cond, $value){
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($cond, $value);
            return $this->db->get()->result();
        }

        public function getUserLog($tab){
            $this->db->select('*');
            $this->db->from('utilisateur');
            $this->db->where('email', $tab['email']);
            $this->db->where('mdp', $tab['mdp']);
            return $this->db->get()->result();
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
                    return 1;           // if a value is null
                }
            }
            return 0;                   // if not
        }

        function myInsert($nom_table,$tab){
            $this->db->insert($nom_table, $tab);
        }

        function insertSign_in($data){
            $this->db->insert('utilisateur', $data);
            // echo $this->db->affected_rows();
            
            $id = $this->getId("UTI");
            $this->db->insert('porte_monnai',array( // creer un porte monnai pour le
                'iduser' => $id,                    // nouveau user
                'valeur' => 0
            ));
            return $id;

        }
    }
?>
