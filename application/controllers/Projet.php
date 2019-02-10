<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Projet extends CI_Controller
{




    public function creer()
    {
        $this->load->helper('url_helper');
        $this->load->helper( 'url');
        $this->load->model('Projetbdd');
        $data['budget'] = $this->Projetbdd->listerBudget();
        $data['competence'] = $this->Projetbdd->listerTechnologies();
        $this->load->view('layout/header');
        $this->load->view('pages/formCreationProjet2', $data);
        $this->load->view('layout/footer');



    }


    //----------------------------------------------------
    public function lister()
    {

        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->listerProjetTous();
        $this->load->view('layout/header');
        $this->load->view('pages/liste_projets', $data);
    }

    public function detailProjet(){
        $id = $this->input->get('id');
        $this->load->helper('url');
        $this->load->model('Projetbdd');
        //var_dump ($this->Projetbdd->detailProjet($id));
        $data['news'] = $this->Projetbdd->detailProjet($id);
        $this->load->view('layout/header');
        $this->load->view('pages/detailProjet', $data);
    }


    public function enregistrer()
    {
        $titre = $this->input->post('titre');
        $description = $this->input->post('presentation');
        $budget = $this->input->post('categorie');
        $competence = $this->input->post('competence');
        $motcle = $this->input->post('motcle');
        $porteur_projet_id = $this->session->userdata('id');

        echo $titre.' '.$description.' '.$budget.' '.$competence;



       if ($titre!= "" && $description!= "" && $budget != "" ) {

            $this->load->model('Projetbdd');

            if( $this->Projetbdd->creerProjet($titre, $description, $budget, $motcle, $porteur_projet_id, $competence)!=1){
                $this->load->helper('url');
                $this->load->view('layout/header');
                $this->load->view('pages/formCreationProjetFail');

            }else{

                $this->load->helper('url');
                $this->load->view('layout/header');
                $this->load->view('pages/formCreationProjetSuccess');
            }
        }

    }

    public function listeComp(){
        $this->load->model('Projetbdd');
        $competences = $this->Projetbdd->listerTechnologies();
        echo(json_encode($competences));


    }



}
