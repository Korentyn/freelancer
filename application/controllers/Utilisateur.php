<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Utilisateur extends CI_Controller
{



    // Affichage formulaire inscription utilisateurs
    public function creer()
    {
        $this->load->model('Userbdd');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formulaireInscription');
        $this->load->view('layout/footer');
    }



    //Affichage de tous les utilisateurs
    public function lister()
    {
        $this->load->helper('url');
        $this->load->model('Userbdd');
        $data['news'] = $this->Userbdd->listerUserTous();
        $this->load->view('layout/layout');
        $this->load->view('pages/liste_freelancer', $data);
    }

    //Formulaire sélection des techno
    public function selectionTechno()
    {
        $this->load->helper('url');
        $this->load->view('layout/layout');
        $this->load->view('pages/formSelectionTechnologies');
    }

    //Vérification connexion
    public function connexion()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        //Vérification password ou login vide
        if ($password != "" && $login != "") {
            $this->load->model('Userbdd');

            //Vérification login existe + récupération
            if($result = $this->Userbdd->verifUtilisateur($login)){
                $passBDD = $result[0]->password;

                if(password_verify($this->input->post('password'),$passBDD)){
                    $role_id = $result[0]->role_id;

                    $this->session->set_userdata('pseudo', $login);
                    $this->session->set_userdata('role_id', $role_id);

                    $data=0;
                    header("Refresh:0");
                }else{
                    $data = 2;
                }


            }

        }else {
            $data = 1;

        }
        echo $data;
    }

    //Déconnexion de l'utilisateur
    public function deconnexion()
    {
        //	Détruit la session
        $this->load->helper('url');
        $this->session->sess_destroy();

        //	Redirige vers la page d'accueil
        redirect('', 'refresh');

//        $this->load->view('layout/layout');
//        $this->load->view('pages/accueil');
//        $this->load->view('layout/footer');

    }

    //Enregistrement d'un utilisateur
    public function enregistrer()
    {
        // je récupère des data dans le body de la requete HTTP
        $role = $this->input->get('role');
        $login = $this->input->post('login');
        $civilite = $this->input->post('civilite');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $password = $this->input->post('password');
        $passwordVerif = $this->input->post('passwordVerif');
        $email = $this->input->post('email');
        $emailVerif = $this->input->post('emailVerif');
        $telephone = $this->input->post('telephone');
        $presentation = $this->input->post('presentation');


        //echo $login." ".$civilite." ".$nom." ".$prenom." ".$password." ".$passwordVerif." ".$email." ".$emailVerif." ".$telephone." ".$presentation;

        // Verification similitude entre les champs mail + mot de passe
        if ($password != $passwordVerif || $email != $emailVerif || $password == "" || $email == "") {
            $this->load->helper('url');
            $this->load->view('layout/layout');
            $this->load->view('pages/formCreationUserFail');
            $this->load->view('layout/footer');
        } else {

            //Verification complétude des champs obligatoires
            if ($login != "" && $civilite != "" && $nom != "" && $prenom != "" && $role != "") {

                $this->load->model('Userbdd');

                // Vérification existance du login + mail
                if ($this->Userbdd->verifCreationUtilisateur($login, $email) == 1) {
                    $this->load->helper('url');
                    $this->load->view('layout/layout');
                    $data['erreur'] = "email ou login déjà utilisé";
                    $this->load->view('pages/formCreationUserFail', $data);
                    $this->load->view('layout/footer');
                } else {

                    //Cryptage du mot de passe
                    $password = password_hash($password,PASSWORD_DEFAULT);

                    //Verification si enregistrement en base est un succès
                    if ($this->Userbdd->creerUtilisateur($login, $civilite, $nom, $prenom, $email, $password, $telephone, $presentation, $role) != 1) {
                        $this->load->helper('url');
                        $this->load->view('layout/layout');
                        $this->load->view('pages/formCreationUserFail');
                        $this->load->view('layout/footer');
                    } else {
                        $this->load->helper('url');
                        $this->load->view('layout/layout');
                        $this->load->view('pages/formCreationUserSuccess');
                        $this->load->view('layout/footer');
                    }
                }
            }


        }


    }

    public function tableauAdmin()
    {
        $this->load->view('admin/index');
    }

    public function tableau()
    {

    }
}
