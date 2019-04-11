<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Inscription extends CI_Controller {



    public function index()
    {
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/header');
        $this->load->view('pages/Inscription');

    }

    public function recruter(){

        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/header');
        $this->load->view('pages/formCreationPP');

    }

    public function travailler(){
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/header');
        $this->load->view('pages/formCreationFreelance');

    }

    function check_default($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }
}
