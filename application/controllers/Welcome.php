<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('layout/header');
        $this->load->view('pages/accueil');
        $this->load->view('layout/footer');
    }

}
