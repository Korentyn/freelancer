<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Projet extends CI_Controller
{



// Formulaire de création de projet
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


    //Affichage de tous les projets
    public function lister()
    {

        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->listerProjetTous();
        $this->load->view('layout/header');
        $this->load->view('pages/liste_projets', $data);
    }

    //Affichage de la page d'un projet
    public function detailProjet(){
        $id = $this->input->get('id');
        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->detailProjet($id);
        $this->load->view('layout/header');
        $this->load->view('pages/detailProjet', $data);
    }

    //Enregistrement d'un devis (Free)
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


        if ($projet_id!= "" && $utilisateur_id != "" && $prix_devis != "" && $heures != "" && $commentaire != "" && $competence != ""
            && isset($titreTab) && isset($dateTab)) {

            $oldDate = max($dateTab);

            $prix_lot= round($prix_devis/sizeof($titreTab), 2);
            $this->load->helper('url');
            $this->load->model('Projetbdd');
             $result = $this->Projetbdd->deviserProjet($tarif_hor, $heures, $prix_devis, $utilisateur_id, $projet_id, $dateTab, $prix_lot, $titreTab, $competence, $oldDate, $commentaire);

            if (in_array(false, $result)) {
				$data['news'] = $this->Projetbdd->detailProjet($projet_id);
				$this->load->view('layout/header');
				$this->load->view('pages/detailProjet', $data);
            }else{
				$data['news'] = $this->Projetbdd->listerProjetTous();
				$this->load->view('layout/header');
				$this->load->view('pages/liste_projets', $data);
            }


        }



	}


	// Enregistrement d'un projet (PP)
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

    //Renvoi les compétences format JSON
    public function listeComp(){
        $this->load->model('Projetbdd');
        $competences = $this->Projetbdd->listerTechnologies();
        echo(json_encode($competences));


    }

    //Affichage des projets créés de l'utilisateur (PP)
    public function mesProjets(){
        $utilisateur_id = $this->session->userdata('id');
        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->listerMesProjets($utilisateur_id);
        //var_dump($data['news']);
        $key = "id";
        if(array_key_exists($key, $data['news'])) {
            if ($data['news'][$key]===null) {
                $data['news']= null;
            } else {

            }
        }

        $this->load->view('layout/header');
        $this->load->view('pages/listProjetCree', $data);
    }

    //Affichage des devis reçu d'un projet (PP)
    public function monProjetDetail(){
        $id_projet = $this->input->get('id');

        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['projet'] = $this->Projetbdd->detailProjetCree($id_projet);
        $data['devis'] = $this->Projetbdd->devisProjetCree($id_projet);

        //var_dump($data['nbresult']);
        $this->load->view('layout/header');
        $this->load->view('pages/detailProjetCree', $data);
    }

    //Affichage des devis créés de l'utilisateur (Free)
    public function mesDevis(){
        $utilisateur_id = $this->session->userdata('id');
        $this->load->helper('url');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->listerProjetTous();
        //$this->load->view('layout/header');
        //$this->load->view('pages/liste_projets', $data);
    }

    //Affichage des détails d'un devis reçu (vision PP)
	public function detailDevis(){
		$id_devis = $this->input->get('id');
		$this->load->helper('url');
		$this->load->model('Projetbdd');
		//var_dump($id_devis);
		$data['devis'] = $this->Projetbdd->detailDevis($id_devis);
        $data['lots'] = $this->Projetbdd->detailLotsDevis($id_devis);
		$this->Projetbdd->lectureDevis($id_devis);
		$this->load->view('layout/header');
		$this->load->view('pages/detailDevis', $data);
	}

	public function accepterDevis(){
        $utilisateur_id = $this->session->userdata('id');
        $id_devis = $this->input->get('id');
        $this->load->library('email');
        //TODO envoyer email
        $this->email->set_newline("\r\n");
        $this->email->from('frantzcorentin@gmail.com', 'Votre équipe Grow Up');
        $this->email->to('corentin.tek@hotmail.fr');
        $this->email->subject("Vous avez accepté un devis");
        $this->email->message('Bonjour, vous avez acceptez votre devis.');
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }

    public function refuserDevis(){
        $utilisateur_id = $this->session->userdata('id');
        $id_devis = $this->input->get('id');

    }
}
