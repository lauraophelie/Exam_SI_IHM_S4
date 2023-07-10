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

    //----------------- REDIRECTION FRONT -----------------//

    public function toHome(){
        $this->load->helper('url');
		$this->load->view('home');
    }
    public function toProfilUser(){
        $this->load->helper('url');
		$this->load->view('ProfilUser');
    }

    public function toAddCompletion(){
        $this->load->helper('url');
		$this->load->view('AddCompletion');
    }

    public function toListCode(){
        $this->load->helper('url');
		$this->load->view('listCode');
    }

    public function toWallet(){
        $this->load->helper('url');
		$this->load->view('wallet');
    }

    //----------------- REDIRECTION BACK -----------------//

    public function toHomeAdmin(){
        $this->load->helper('url');
		$this->load->view('HomeAdmin');
    }

    public function toListeRegime(){
        $this->load->helper('url');
		$this->load->view('listRegime');
    }
    
    public function toListActivite(){
        $this->load->helper('url');
		$this->load->view('listActivite');
    }

    public function toAddDish(){
        $this->load->helper('url');
		$this->load->view('AddDish');
    }
    
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
                $this->load->helper('url');
		        $this->load->view('HomeAdmin');
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
            $this->create_session($userdata);

            $this->load->helper('url');                       /// et recupere l'id de l'user
		    $this->load->view('home');
        }
        else{                                           /// sinon redirige vers la page de login
            $this->load->helper('url');
		    $this->load->view('login');
        }
    }

    public function create_session($userdata) {
        // Charger la bibliothèque de sessions
        $this->load->library('session');
        if (!is_dir(APPPATH . 'sessions')) {
            mkdir(APPPATH . 'sessions', 0700);
        }
        
        $this->session->set_userdata($userdata);
    }

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
