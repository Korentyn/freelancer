<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Inscription extends CI_Controller {


//    public function __construct()
//    {
//        parent::__construct();
//
//    }

    public function index()
    {
        $this->load->model('Userbdd');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formulaireInscription');
        $this->load->view('layout/footer');
    }

    public function projet(){
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Projetbdd');
        $this->load->view('layout/layout');

        $this->form_validation->set_rules('titre', 'Titre', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        $this->form_validation->set_rules('categorie','Categories','required|callback_check_default');
        $this->form_validation->set_message('check_default', 'Vous devez sélectionner une catégorie de projet');

        $this->form_validation->set_rules('tableau-competences', 'Compétences attendues', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('pages/formCreationProjet');
        }
        else
        {
            $this->load->view('pages/formCreationProjetSuccess');
        }
        $this->load->view('layout/footer');
    }

    function check_default($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }
}