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
        $this->session->set_userdata($userdata);
    }

    public function logout() {
        // Charger la bibliothèque de sessions
        $this->load->library('session');
    
        // Détruire la session
        $this->session->sess_destroy();
    
        // Rediriger l'utilisateur vers une page de connexion ou une autre page appropriée
        $this->load->view('login');
    }
    
}
