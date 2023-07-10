<?php
    class Admin extends CI_Model{

        function validCode($idCode){
            
        }

        function invaldCode($idCode){
            $this->db->where('idCode', $idCode);
            $this->db->update('etat', 0);           // etat = 1 valide ; etat = 0 invalid
        }

        function createPlat($tabPlat){
            $this->db->insert('plat',$tabPlat);   // $tabPlat['designation/type_plat/image_path']
        }

        function createRegime($tabDataRegime){                      // $tabDataRegime['regime/plat/sport'][0,1,2,...(value)]
            //-----create a new regime--------//
            $this->db->insert('regime',$tabDataRegime['regime']);   // $tabDataRegime['regime'][designation]
            $id = $this->db->insert_id();
            for ($i=0; $i < count($tabDataRegime['plat']); $i++) {
                //----------create a new plat identified by the prevew regime---------//
                $this->db->insert('regime_plat',array(
                    'regime' => $id,
                    'plat' => $tabDataRegime['plat'][$i]
                ));
                
            }
            for ($i=0; $i < count($tabDataRegime['sport']); $i++) { 
                //----------create a new sport identified by the prevew regime---------//
                $this->db->insert('regime_sport',array(
                    'regime' => $id,
                    'sport' => $tabDataRegime['sport'][$i]
                ));
            }
        }

        function createSport($designationSport){
            $this->db->insert('sport',array('designation' => $designationSport));
        }

        function updateSport($tabSport){
            $this->db->where('regime', $tabSport['idReg']);
            $this->db->update('sport', $tabSport);
        }

        function deleteSport($tabSport){
            $this->db->where('regime', $tabSport['idReg']);
            $this->db->delete('sport');
        }

        function createTarif($tabTarif){
            $this->db->insert('sport',$tabTarif);

        }

        function updateTarif($tabTarif){
            $this->db->where('regime', $tabTarif['idReg']);
            $this->db->update('tarifs_regime', $tabTarif);
        }

        function deleteTarif(){
            $this->db->where('regime', $tabSport['idReg']);
            $this->db->delete('tarifs_regime');
        }

        function updateRegime($tabRegime){
            $data_plat = array(
                'regime' => $tabRegime['idReg'],
                'plat' => $tabRegime['idPlat']
            );
            $this->db->where('regime', $tabRegime['idReg']);
            $this->db->update('regime_plat', $data_plat);           // regime_plat

            $data_sport = array(
                'regime' => $tabRegime['idReg'],
                'sport' => $tabRegime['idSport']
            );
            $this->db->where('regime', $tabRegime['idReg']);        
            $this->db->update('regime_sport', $data_sport);         // regime_sport

            $data_regime = array(
                'id' => $tabRegime['idReg'],
                'designation' => $tabRegime['designation']
            );
            $this->db->where('regime', $tabRegime['idReg']);
            $this->db->update('regime', $data_regime);              // enfin regime (designation)
        }

        function deleteRegime($idRegime){
            //-------------plat-------------//
            $this->db->where('regime', $idRegime);
            $this->db->delete('regime_plat');
            //-----------sport-------------//
            $this->db->where('regime', $idRegime);
            $this->db->delete('regime_sport');
            //-----------regime------------//
            $this->db->where('id', $idRegime);
            $this->db->delete('regime');
            //-----------tarif------------//
            $this->db->where('regime', $idRegime);
            $this->db->delete('tarifs_regime');
        }

        function verifLog($tab1){
            $tab_base = $this->getValeur();
            // var_dump($tab1);
            // var_dump($tab_base);
            for ($i=0; $i < count($tab_base); $i++) { 
                if($tab_base[$i]->email==$tab1['nom'] && $tab_base[$i]->email==$tab1['email'] && $tab_base[$i]->mdp==$tab1['mdp']){
                    return 1;
                }
            }
            return 0;
        }

        public function getValeur() {
            $query = $this->db->get('administrateur');
            return $query->result();
        }

        public function getValeur($table){
            $query = $this->db->get($table);
            return $query->result();

        } 
    }
?>