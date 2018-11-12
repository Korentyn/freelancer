<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trouver extends CI_Controller
{


    public function index()
    {
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/accueil');
    }
    public function projets()
    {
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/liste_projets');
    }

    public function freelance()
    {
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/liste_freelancer');
    }
}
