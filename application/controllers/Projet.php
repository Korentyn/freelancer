<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Projet extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

// Formulaire de création de projet
    public function creer()
    {
        $this->load->helper('url_helper');
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

        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->listerProjetTous();
        $this->load->view('layout/header');
        $this->load->view('pages/liste_projets', $data);
    }

    //Affichage de la page d'un projet
    public function detailProjet(){
        $id_projet = $this->input->get('id');
        $this->load->model('Projetbdd');
        $data['news'] = $this->Projetbdd->detailProjet($id_projet);
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
                $this->load->view('layout/header');
                $this->load->view('pages/formCreationProjetFail');

            }else{
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
        $this->load->model('Projetbdd');
        $data['devis'] = $this->Projetbdd->listerMesDevis($utilisateur_id);
        $this->load->view('layout/header');
        $this->load->view('pages/listDevisCree', $data);
    }

    //Affichage des détails d'un devis reçu (vision PP)
	public function detailDevisPP(){
		$id_devis = $this->input->get('id');
        $etat_devis = $this->input->get('etat');
		$this->load->model('Projetbdd');
        if ($etat_devis == 1){
            $this->Projetbdd->lectureDevis($id_devis);
        }
		$data['devis'] = $this->Projetbdd->detailDevis($id_devis);
        $data['lots'] = $this->Projetbdd->detailLotsDevis($id_devis);
		$this->load->view('layout/header');
		$this->load->view('pages/detailDevisPP', $data);
	}

	//Affichage détails d'un devis envoyé vision Freelance
	public function detailDevisFreelance(){
        $id_devis = $this->input->get('id');
        $this->load->model('Projetbdd');
        $data['devis'] = $this->Projetbdd->detailDevisProjet($id_devis);
        $data['lots'] = $this->Projetbdd->detailLotsDevis($id_devis);
        $this->load->view('layout/header');
        $this->load->view('pages/detailDevisCree', $data);
    }

    //Acceptation du devis par le porteur de projet (le free doit maintenant accepter de démarrer le projet)
	public function accepterDevis(){
        $utilisateur_id = $this->session->userdata('id');
        $id_devis = $this->input->get('id');
        $id_projet = $this->input->get('p');
            //Partie envoi de mail
            $this->load->library('email');
            $mail['template']='activationCompte';
            //$mail['utilisateur_id']=$utilisateur_id;
            /*$this->email->set_newline("\r\n");
            $this->email->from('frantzcorentin@gmail.com', 'Votre équipe Grow Up');
            $this->email->to('frantzcorentin@gmail.com');
            $this->email->subject("Votre devis a été accepté");
            $message=$this->load->view('email/activationCompte', $mail,true);
            $this->email->message($message);
            $this->email->send();*/
            //////////////////////

            $this->load->model('Projetbdd');
            $data = $this->Projetbdd->accepterDevis($id_devis);

            if ($data ){
                redirect('/index.php/Projet/mesProjets', 'refresh');

            }else{
                $this->load->view('layout/header');
                $this->load->view('pages/pageErreur');
            }


    }

    //Refuser
    public function refuserDevis(){
        $utilisateur_id = $this->session->userdata('id');
        $id_devis = $this->input->get('id');

    }

    //Lancement du projet une fois que le freelance accepte
    public function commencerProjet(){
        $id_devis = $this->input->get('id');
        $id_projet = $this->input->get('p');
        $this->load->model('Projetbdd');
        $data = $this->Projetbdd->commencerDevis($id_devis);
        $data2 = $this->Projetbdd->refuserAutresDevis($id_projet);
        $data3 = $this->Projetbdd->commencerProjet($id_projet);

        if ($data && $data2 && $data3){
            redirect('/index.php/Projet/detailDevisFreelance?id='.$id_devis);

        }else{
            $this->load->view('layout/header');
            $this->load->view('pages/pageErreur');
        }
    }

    public function uploaderLot(){
        $id_devis = $this->input->get('devis');
        $id_lot = $this->input->get('id');
        $this->load->model('Projetbdd');

        $id_projet = $this->Projetbdd->recupererIdProjet($id_devis);
        $nom_lot = $this->Projetbdd->recupererNomLot($id_lot);
        $nom_fichier = $id_projet[0]['id'].'_'.$id_lot.$nom_lot[0]['titre'];

        $config['upload_path']   = './uploads/';
        $config['file_name'] = $nom_fichier;
        $config['allowed_types'] = 'zip';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            if ($this->Projetbdd->validerLot($id_lot, $nom_fichier)){
                $data = $this->Projetbdd->checkAutresLots($id_devis);
                if(empty($data)){
                   if ($this->Projetbdd->terminerDevis($id_devis)) {

                   }else{
                       $error = array('error' => "Problème dans la validation du devis, merci de contacter le support à support@grow-up.com");
                       $this->load->view('layout/header');
                       $this->load->view('pages/pageErreur', $error);
                   }
                }
                redirect('index.php/Projet/detailDevisFreelance?id='.$id_devis);
            }else{
                $error = array('error' => "Problème dans l'envoi de votre lot, merci de contacter le support à support@grow-up.com");
                $this->load->view('layout/header');
                $this->load->view('pages/pageErreur', $error);
            }


        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('layout/header');
            $this->load->view('pages/pageErreur', $error);
        }
    }

    public function download($filename){
        if(!empty($filename)){
            $this->load->helper('download');
            //file path
            $file = 'uploads/'.$filename.'.zip';

            //download file from directory
            force_download($file, NULL);
        }
    }

    public function validerProjet(){

        $devis_id = $this->input->get('id');
        $this->load->model('Projetbdd');
        $result = $this->Projetbdd->getProjetId($devis_id);
        $projet_id = $result[0]['id_projet'];

        //var_dump($result);
        if ($this->Projetbdd->terminerProjet($projet_id) && $this->Projetbdd->validerDevis($devis_id)) {
            redirect('index.php/Projet/detailDevisPP?id='.$devis_id);
        }else{
            $error = array('error' => "Problème dans la validation du projet, merci de contacter le support à support@grow-up.com");
            $this->load->view('layout/header');
            $this->load->view('pages/pageErreur', $error);
        }
    }

    public function refuserProjet(){

        $devis_id = $this->input->get('id');
        $this->load->model('Projetbdd');
        $result = $this->Projetbdd->getProjetId($devis_id);
        $projet_id = $result[0]['id_projet'];

        var_dump($projet_id);

        if ($this->Projetbdd->refuserProjet($projet_id) && $this->Projetbdd->refuserDevis($devis_id)) {
            redirect('index.php/Projet/detailDevisPP?id='.$devis_id);
        }else{
            $error = array('error' => "Problème dans le refus du projet, merci de contacter le support à support@grow-up.com");
            $this->load->view('layout/header');
            $this->load->view('pages/pageErreur', $error);
        }
    }
}
