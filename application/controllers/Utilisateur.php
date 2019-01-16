<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Utilisateur extends CI_Controller
{

    public function creer()
    {
        $this->load->model('Userbdd');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formulaireInscription');
        $this->load->view('layout/footer');
    }



    public function freelance()
    {
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/liste_freelancer');
    }




    //--------------------------------------------------------------------------------
    public function enregistrer()
    {
        // je récupère des data dans le body de la requete HTTP
        $login = $this->post('login');
        $civilite = $this->post('civilite');
        $nom = $this->post('nom');
        $prenom = $this->post('prenom');
        $password = $this->post('password');
        $passwordVerif = $this->post('passwordVerif');
        $email = $this->post('email');
        $emailVerif = $this->post('emailVerif');
        $telephone = $this->post('telephone');
        $presentation = $this->post('presentation');


        echo $login." ".$civilite." ".$nom." ".$prenom." ".$password." ".$passwordVerif." ".$email." ".$emailVerif." ".$telephone." ".$presentation;

//        if ($nom != "" && $prenom != "") {
//            $this->load->model('Userbdd');
//            $this->Userbdd->creerUser($nom, $prenom, $note);
//
//            $donnees_reponse = array("message" => "creation " . $nom . " et " . $prenom . " ok !");
//            $status = 201;
//        } else {
//            $donnees_reponse = array("message" => "erreur creation manque prenom");
//            $status = 408;
//        }
//
//        $this->response($donnees_reponse, $status);


    }




}
