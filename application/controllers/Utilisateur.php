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
    public function user_post()
    {

        // je récupère des data dans le body de la requete HTTP
        $nom = $this->post('nom');
        $prenom = $this->post('prenom');
        $note = $this->post('note');

        if ($nom != "" && $prenom != "") {
            $this->load->model('Userbdd');
            $this->Userbdd->creerUser($nom, $prenom, $note);

            $donnees_reponse = array("message" => "creation " . $nom . " et " . $prenom . " ok !");
            $status = 201;
        } else {
            $donnees_reponse = array("message" => "erreur creation manque prenom");
            $status = 408;
        }

        $this->response($donnees_reponse, $status);


    }


    public function supuser_get()
    {
        $id = $this->get('id_user');

        if ($id != "") {
            $this->load->model('Userbdd');
            $this->Userbdd->supprimerUser($id);
            $donnees_reponse = array("message" => "Compte supprime, Merci !");
            $status = 201;
        } else {

            $donnees_reponse = array("message" => "erreur de suppression du commentaire");
            $status = 408;

        }
        $this->response($donnees_reponse, $status);
    }


}
