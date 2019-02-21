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
        $data['news'] = $this->Projetbdd->detailProjet($id);
        $this->load->view('layout/header');
        $this->load->view('pages/detailProjet', $data);
    }

    public function deviser(){
		$projet_id = $this->input->get('id');
		$utilisateur_id = $this->session->userdata('id');
        $prix_devis = $this->input->post('prix');
        $heures = $this->input->post('heures');
		$tarif_hor = $this->input->post('tarif_hor');
        $commentaire = $this->input->post('commentaire');
        $competence = $this->input->post('competence');

        $i = 0;
        foreach($titre = $this->input->post('titre-lot') as $key => $value) {
            $titreTab[$i] = array("$value");
            $i++;
        }

        $i = 0;
        foreach($date = $this->input->post('date-lot') as $key => $value) {
        	$value = strtr($value,'/', '-');
            $dateTab[$i] = array(date("Y-m-d", strtotime($value)));
            $i++;
        }
        //echo ($titre.' '.$date.' '.$idProjet.' '.$idUtilisateur.' '.$prix.' '.$heures.' '.$commentaire.' '.$competence);
        //var_dump($titreTab);
        //var_dump($dateTab);

        if ($projet_id!= "" && $utilisateur_id != "" && $prix_devis != "" && $heures != "" && $commentaire != "" && $competence != ""
            && isset($titreTab) && isset($dateTab)) {

//            var_dump ($idProjet.' '.$idUtilisateur.' '.$prix.' '.$heures.' '.$commentaire.' '.$competence);
//            var_dump($titreTab);
//            var_dump($dateTab);
            $this->load->helper('url');
            $this->load->model('Projetbdd');
            if( $this->Projetbdd->deviserProjet($tarif_hor, $heures, $prix_devis, $utilisateur_id, $projet_id, $date_deploiement, $prix_lot, $titre_lot)!=1){

            }

        }



	}


    public function enregistrer()
    {
        $titre = $this->input->post('titre');
        $description = $this->input->post('presentation');
        $budget = $this->input->post('categorie');
        $competence = $this->input->post('competence');
        $motcle = $this->input->post('motcle');
        $porteur_projet_id = $this->session->userdata('id');

//        echo $titre.' '.$description.' '.$budget.' '.$competence;



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
