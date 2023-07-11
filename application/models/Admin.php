<?php
    class Admin extends CI_Model {

        //---------------porte monnai----------------//
        function addToPorteMonnai($idCode,$idUser){
            // var_dump($idCode);
            // var_dump($idUser);
            $valueCode = $this->db->select('valeur')->where('idcode', $idCode)->get('code')->row()->valeur;

            // Récupérer la valeur précédente de la colonne 'colonne1' pour l'enregistrement spécifique
            $ancienneValeur = $this->db->select('valeur')->where('iduser', $idUser)->get('porte_monnai')->row()->valeur;

            // Calculer la nouvelle valeur en ajoutant l'ancienne valeur et la nouvelle valeur
            $nouvelleValeur = $ancienneValeur + $valueCode;

            // Mettre à jour la colonne 'colonne1' avec la nouvelle valeur
            $this->db->where('iduser', $idUser);
            $this->db->update('porte_monnai', array('valeur' => $nouvelleValeur));

        }

        //---------------code---------------------//
        function cancelCode($idCode){
            $this->db->where('idcode', $idCode);
            $this->db->update('code', array('etat' =>'1'));
        }

        function validCode($idCode,$idUser){                // ajouter valeur du code par admin(validation)
            $this->addToPorteMonnai($idCode,$idUser);
            $this->invalidateCode($idCode);
        }

        function invalidateCode($idCode){                      // invalider les code apres validations
            $this->db->where('idcode', $idCode);
            $this->db->update('code', array('etat' => '-1'));                   // etat = 1 valide ; etat = 0 en attente ; etat = -1 invalid
        }

        function getWaitingCode(){
            $this->db->select('*');
            $this->db->from('v_code_user');
            $this->db->where('etat', '0');
            return $this->db->get()->result();
        }

        //-------------------plat--------------------------//
        function createPlat($tabPlat){
            $this->db->insert('plat',$tabPlat);   // $tabPlat['designation/type_plat/image_path']
        }

        //--------------------sport------------------------//
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

        //---------------tarif regime---------------------//
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

        //----------------regime---------------//

        function createRegime($tabDataRegime){                      // $tabDataRegime['regime/plat/sport'][0,1,2,...(value)]
            //-----create a new regime--------//
            $this->db->insert('regime',$tabDataRegime['regime']);   // $tabDataRegime['regime'][designation]
            $id = $this->getId('REG');                              // idRegime avec prefixe 'REG'
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
                if($tab_base[$i]->nom==$tab1['nom'] && $tab_base[$i]->email==$tab1['email'] && $tab_base[$i]->mdp==$tab1['mdp']){
                    return 1;
                }
            }
            return 0;
        }

        public function getValeur() {
            $query = $this->db->get('administrateur');
            return $query->result();
        }

        public function getValues($table){
            $query = $this->db->get($table);
            return $query->result();

        } 

        function getId($prefixe){
            $id = $this->db->insert_id();
            return $prefixe.$id;
        }
    }
?>