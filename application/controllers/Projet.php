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
        $this->load->view('layout/layout');
        $this->load->view('pages/formCreationProjet', $data);
        $this->load->view('layout/footer');



    }


    //----------------------------------------------------
    public function lister()
    {
        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->listerProjetTous();
        $this->load->view('layout/layout');
        $this->load->view('pages/liste_projets', $data);
    }


    //----------------------------------------------------
    public function enregistrer()
    {

        $titre = $this->input->post('titre');
        $description = $this->input->post('description');
        $budget = $this->input->post('categorie');
        $competence = $this->input->post('competence');
        $motcle = $this->input->post('motcle');
        $porteur_projet_id = 1;

        //echo $titre.' '.$description.' '.$budget.' '.$competence.' '.$motcle;



       if ($titre!= "" && $description!= "" && $budget != "" ) {

            $this->load->model('Projetbdd');

            if( $this->Projetbdd->creerProjet($titre, $description, $budget, $motcle, $porteur_projet_id, $competence)!=1){
                $this->load->helper('url');
                $this->load->view('layout/layout');
                $this->load->view('pages/formCreationProjetFail');

            }else{

                $this->load->helper('url');
                $this->load->view('layout/layout');
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
