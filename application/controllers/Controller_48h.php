<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_48h extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    //--------------------CRUD------------------------//
    public function cancelCode($idParam){
        // echo $idParam;
        $this->load->model('Admin');
        $this->Admin->cancelCode($idParam);

        $this->toHomeAdmin();
    }

    public function validateCode(){
        $idCode = $this->input->get('idcode');
        $iduser = $this->input->get('id');

        $this->load->model('Admin');
        $this->Admin->validCode($idCode,$iduser);
        $this->toHomeAdmin();
    }

    public function supReg(){
        $idReg = $this->input->get('id');
        // var_dump($idReg);
        $this->load->model('Admin');
        $this->Admin->deleteRegime($idReg);

        $this->toListeRegime();
    }

    public function updateActiv(){

    }

    public function updateRegime(){
        $id = $this->input->post('idr');
        $nom = $this->input->post('nom');
        $objectif = $this->input->post('regimeType');
        $plat = $this->input->post('plat');
        $sport = $this->input->post('sport');

        // var_dump($id);
        // var_dump($nom);
        // var_dump($objectif);
        // var_dump($plat);
        // var_dump($sport);

        $this->load->model('Admin');
        $this->Admin->myUpdate('regime','id',$id,array('designation' => $nom));

        $this->toHomeAdmin();
    }

    public function createRegime(){
        $nom = $this->input->post('nom');
        $objectif = $this->input->post('regimeType');
        $plat = $this->input->post('plat');
        $sport = $this->input->post('sport');

        // var_dump($nom);
        // var_dump($objectif);
        // var_dump($plat);
        // var_dump($sport);

        $tabData = array(
            'regime' => array('designation' => $nom),
            'plat' => $plat,
            'sport' => $sport
        );

        // var_dump($tabData);
        $this->load->model('Admin');
        $this->Admin->createRegime($tabData);

        $this->toListeRegime();

    }

    public function suppAct(){
        $id = $this->input->get('id');
        // var_dump($id);
        $this->load->model('Admin');
        $this->Admin->myDel('regime_sport','sport',$id);
        $this->Admin->myDel('sport','id',$id);

        $this->toListActivite();

    }

    //------------------- WALLET -----------------------//
    
    public function verifCode(){
        $code = $this->input->post('code');
        $id = $this->input->post('id');
        $this->load->model('Sign');
        $etat = $this->Sign->siCodeExist($code);
        // echo $etat;
        $this->Sign->waitStatusCode($code,$id);

        $this->toHome();
    }

    

    //-------------------- LIST CODE  ------------------//

    public function getCode(){
        $this->load->model('Sign');
        $code = $this->Sign->getValues('code');
        return $code;
    }



    //--------------------- COMPLETION --------------------//

    public function getRegime(){
        $this->load->model('Sign');
        $regimes = $this->Sign->getValues('regime');
        return $regimes;
    }

    public function insertDetailUser(){
        $tabLog = array(
            'utilisateur' => $this->input->post('id'),
            'taille' => $this->input->post('taille'),
            'poids' => $this->input->post('pound'),
            'genre' => $this->input->post('sexe'),
            'date_naissance' => $this->input->post('dtn')
        );
        $this->load->model('Sign');
        $val = $this->Sign->IsValuesNull($tabLog);
        if($val==0){                                // procede si les valeurs ne sont pas nulles


        $tabObj = array(
            'idobjectif' => $this->input->post('objectif'),
            'iduser' => $this->input->post('id')
        );

        $this->load->model('Sign');
        $val = $this->Sign->IsValuesNull($tabLog);
        $val2 = $this->Sign->IsValuesNull($tabObj);

        if($val==0 && $val2==0){                                // procede si les valeurs ne sont pas nulles
            $this->Sign->myInsert('details_utilisateur',$tabLog);        /// insertion dans la table correspondant au sign up
            $this->Sign->myInsert('user_objectif',$tabObj);        /// insertion dans la table correspondant au sign up

            $this->load->helper('url');                       /// et recupere l'id de l'user
		    $this->load->view('home');
        }
        else{                                           /// sinon redirige vers la page de login
            $this->load->helper('url');
		    $this->load->view('home');
        }
    }

    //----------------- REDIRECTION FRONT -----------------//

    public function toHome(){
        $this->load->helper('url');
		$this->load->view('home');
    }
    public function toProfilUser(){
        $this->load->model('Sign');
        $tab['user'] = $this->Sign->getCond('utilisateur','id',$this->session->userdata('id'));
        // var_dump($tab);
        $this->load->helper('url');
		$this->load->view('ProfilUser',$tab);
    }

    public function toAddCompletion(){

        $dataRegime['allRegime'] = $this->getRegime();


        // $dataRegime['allRegime'] = $this->getRegime();
        // $this->load->helper('url');
		// $this->load->view('AddCompletion',$dataRegime);

        $this->load->model('Sign');
        $dataRegime['allObjectif'] = $this->Sign->getValues('objectif');
        // var_dump($dataRegime);

        $this->load->helper('url');
		$this->load->view('AddCompletion',$dataRegime);
    }

    public function toListCode(){
        $dataCode['allCode'] = $this->getCode();
        $this->load->helper('url');
		$this->load->view('listCode',$dataCode);
    }

    public function toWallet(){
        $this->load->model('Sign');
        $dataWallet['wallet'] = $this->Sign->getValues('v_wallet');
        $this->load->helper('url');
		$this->load->view('wallet',$dataWallet);
    }

    //----------------- REDIRECTION BACK -----------------//

    public function toUpdateRegime(){
        $idreg = $this->input->get('id');
        $this->load->model('Sign');

        // $objectif['objectif'] = $this->Sign->getCond('objectif_regime','regime',$idreg);
        // $plat['plat'] = $this->Sign->getCond('regime_plat','regime',$idreg);
        // $sport['sport'] = $this->Sign->getCond('regime_sport','regime',$idreg);

        $objectif['objectif'] = $this->Sign->getValues('v_objectif_regime');
        $plat['plat'] = $this->Sign->getValues('plat');
        $sport['sport'] = $this->Sign->getValues('sport');

        $allData = array_merge(array_merge(array_merge($plat,$sport),$objectif),array('idreg'=>$idreg));

        // var_dump($allData);
        $this->load->helper('url');
        $this->load->view('updateRegime',$allData);
    }

    public function toAddRegime(){
        $this->load->model('Sign');

        $objectif['objectif'] = $this->Sign->getValues('v_objectif_regime');
        $plat['plat'] = $this->Sign->getValues('plat');
        $sport['sport'] = $this->Sign->getValues('sport');

        $allData = array_merge(array_merge($plat,$sport),$objectif);

        // var_dump($allData);
        $this->load->helper('url');
        $this->load->view('AddRegime',$allData);
    }

    public function toHomeAdmin(){
        $this->load->model('Admin');
        $waitingCode['waitingCode'] = $this->Admin->getWaitingCode();
        // var_dump($waitingCode);
        $this->load->helper('url');
        $this->load->view('HomeAdmin',$waitingCode);
    }

    public function toListeRegime(){

        $this->load->model('Sign');
        $regime['regime'] = $this->Sign->getValues('regime');
        $this->load->helper('url');
		$this->load->view('listRegime',$regime);
    }
    
    public function toListActivite(){
        $this->load->model('Sign');
        $listeActiv['sport'] = $this->Sign->getValues('sport');
        $this->load->helper('url');
		$this->load->view('listActivite',$listeActiv);
    }

    public function toAddDish(){
        $this->load->helper('url');
		$this->load->view('AddDish');
    }

    public function toUpdateActivity(){
        $id = $this->input->get('id');
        // var_dump($id);
        $this->load->model('Admin');
        $this->load->model('Sign');
        $this->Admin->myDel('sport','id',$id);

        $theSport['sport'] = $this->Sign->getCond('sport','id',$id);

        $this->load->helper('url');
		$this->load->view('updateActivity',$theSport);
    }

    public function toTableauBord(){
        $this->load->helper('url');
		$this->load->view('TableauBord');
    }

    public function toAddCode(){
        $this->load->helper('url');
		$this->load->view('AddCode');
    }

    public function toAddActivity(){
        $this->load->helper('url');
		$this->load->view('AddActivity');
    }

    public function addNewCode(){
        $tab = array(
            'idcode' => $this->input->post('code'),
            'valeur' => $this->input->post('val')
        );
        $this->load->model('Sign');
        $this->Sign->myInsert('code',$tab);

        $this->toListCode();
    }

    public function addNewActivity(){
        $tab = array(
            'designation' => $this->input->post('nom')
        );
        $this->load->model('Sign');
        $this->Sign->myInsert('sport',$tab);

        $this->toListActivite();
    }
    
    //------------- LOG --------------//
    public function log_admin(){
        $tabLog = array(
            'nom' => $this->input->post('admin_nom'),
            'email' => $this->input->post('admin_email'),
            'mdp' => $this->input->post('admin_mdp')
        );
        $this->load->model('Admin');
        $this->load->model('Sign');
        $val = $this->Sign->IsValuesNull($tabLog);
        // echo "val = ".$val;
        // var_dump($tabLog);
        if($val==0){                                        // procede si les valeurs ne sont pas nulles
            $authentif = $this->Admin->verifLog($tabLog);    /// insertion dans la table correspondant au sign up
            // echo $authentif;
            if($authentif==1){                                  // si l'authenticite est verifie vrai
                $this->toHomeAdmin();
            }
            else{                                               // sinon
                $this->redirect_admin();
            }
        }
        else{                                               // sinon redirige vers la page de login
            $this->redirect_admin();

        }
    }
    

    public function redirect_admin(){
        $this->load->helper('url');

		$this->load->view('LogAdmin');
    } 
	public function index()
	{
		$this->load->helper('url');

		$this->load->view('login');
		
	}

    public function login(){
        $tabLog = array(
            'email' => $this->input->post('sign_up_email'),
            'mdp' => $this->input->post('sign_up_mdp')
        );
        $this->load->model('Sign');
        $val = $this->Sign->IsValuesNull($tabLog);
        // echo $val;
        if($val==0){                                        // procede si les valeurs ne sont pas nulles
            $authentif = $this->Sign->verifLog($tabLog);    /// insertion dans la table correspondant au sign up

            if($authentif==1){                                  // si l'authenticite est verifie vrai
                $userdata = $this->Sign->getUserLog($tabLog);
                $this->create_session('id',$userdata[0]->id);
                // var_dump($userdata[0]);
                // var_dump($this->session->userdata());
                $this->load->helper('url');
		        $this->load->view('home');
            }
            else{                                               // sinon
                $this->load->helper('url');
		        $this->load->view('login');
            }
        }
        else{                                               // sinon redirige vers la page de login
            $this->load->helper('url');
		    $this->load->view('login');
        }
    }
    
    public function sign_in(){
        $tabLog = array(
            'nom' => $this->input->post('sign_in_nom'),
            'email' => $this->input->post('sign_in_email'),
            'mdp' => $this->input->post('sign_in_mdp')
        );
        $this->load->model('Sign');
        $val = $this->Sign->IsValuesNull($tabLog);
        if($val==0){                                // procede si les valeurs ne sont pas nulles
            $id = $this->Sign->insertSign_in($tabLog);        /// insertion dans la table correspondant au sign up

            $userdata = array_merge(array('id' => $id),$tabLog);
            $this->create_session2($userdata);

            // var_dump($this->session->userdata('id'));

            $this->load->helper('url');                       /// et recupere l'id de l'user
		    $this->load->view('home');
        }
        else{                                           /// sinon redirige vers la page de login
            $this->load->helper('url');
		    $this->load->view('login');
        }
    }
    //-------------- SESSION -----------------//
    public function create_session($key, $userdata) {
        // Charger la bibliothèque de sessions
        $this->load->library('session');
        if (!is_dir(APPPATH . 'sessions')) {
            mkdir(APPPATH . 'sessions', 0700);
        }
        
        $this->session->set_userdata($key,$userdata);
    }

    public function create_session2($userdata) {
        // Charger la bibliothèque de sessions
        $this->load->library('session');
        if (!is_dir(APPPATH . 'sessions')) {
            mkdir(APPPATH . 'sessions', 0700);
        }
        
        $this->session->set_userdata($userdata);
    }

    //-------------- LOGOUT ------------------//
    public function logout() {
        // Charger la bibliothèque de sessions
        $this->load->library('session');
    
        // Détruire la session
        $this->session->sess_destroy();
    
        // Rediriger l'utilisateur vers une page de connexion ou une autre page appropriée
            $this->load->helper('url');
            $this->load->view('login');
    }
    
}
