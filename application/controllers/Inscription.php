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
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/Inscription');
        $this->load->view('layout/footer');
    }

    public function recruter(){

        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formCreationPP');
        $this->load->view('layout/footer');
    }

    public function travailler(){
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formCreationFreelance');
        $this->load->view('layout/footer');
    }

    function check_default($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }
}