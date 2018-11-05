<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'/libraries/REST_Controller.php');

class Inscription extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userbdd');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('pages/formulaireInscription');
        $this->load->view('layout/footer');
    }
/*
    public function view($page){

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('layout/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('layout/footer', $data);
    }
*/



}