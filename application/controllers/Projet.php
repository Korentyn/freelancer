<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Projet extends CI_Controller
{




    public function creer()
    {
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Projetbdd');
        $this->load->view('layout/layout');

//        $this->form_validation->set_rules('titre', 'Titre', 'required');
//        $this->form_validation->set_rules('description', 'Description', 'required');
//
//        $this->form_validation->set_rules('categorie','Categories','required|callback_check_default');
//        $this->form_validation->set_message('check_default', 'Vous devez sélectionner une catégorie de projet');
//
//        $this->form_validation->set_rules('tableau-competences', 'Compétences attendues', 'required');
//

            $this->load->view('pages/formCreationProjet');

        $this->load->view('layout/footer');



    }


    //----------------------------------------------------
    public function lister()
    {
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/liste_projets');
    }


    //----------------------------------------------------
    public function enregistrer()
    {

        $titre = $this->input->post('titre');
        $description = $this->input->post('description');
        $budget = $this->input->post('categorie');
        $competences = $this->input->post('competences');
        $motclefs = $this->input->post('motclefs');
        $porteur_projet_id = 1;

        $competences = explode(";", $competences);
        echo $competences[0];
        echo $competences[1];

//        if ($titre!= "" && $description!= "" && $budget!= "" && $competences!= "") {
//
//
//            $competences = explode(";", $competences);
//            echo $competences[0];
//            echo $competences[1];
//
//
//
//            $this->load->model('Projetbdd');
//            $this->Projetbdd->creerProjet($titre, $description, $budget, $motclef1, $motclef2,
//                $motclef3, $porteur_projet_id);
//        }




        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formCreationProjetSuccess');


    }

    public function listeComp(){
        $this->load->model('Projetbdd');
        $competences = $this->Projetbdd->listerTechnologies();
        $json = json_encode($competences);
        echo($json);

    }



}
