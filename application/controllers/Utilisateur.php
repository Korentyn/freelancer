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


    public function formConnexion(){
		$this->load->helper('url');
		$this->load->view('pages/connexion');

	}

    //Affichage de tous les utilisateurs
    public function lister()
    {
        $this->load->helper('url');
        $this->load->model('Userbdd');
        $data['news'] = $this->Userbdd->listerUserTous();
        $this->load->view('layout/header');
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
        $mail = $this->input->post('mail');
		$password = $this->input->post('password');


        //Vérification password ou login vide
        if (isset($password) && isset($mail)) {
            $this->load->model('Userbdd');

            //Vérification login existe + récupération
            if($result = $this->Userbdd->verifUtilisateur($mail)){
                $passBDD = $result[0]->password;
                $login = $result[0]->login;

                if(password_verify($this->input->post('password'),$passBDD)){
                    $role_id = $result[0]->role_id;
                    $id = $result[0]->id;

                    $this->session->set_userdata('pseudo', $login);
                    $this->session->set_userdata('role_id', $role_id);
					$this->session->set_userdata('id', $id);


					redirect('', 'refresh');
                }else{

					//redirect('index.php/Utilisateur/formConnexion', 'refresh');
					$data2['erreur'] ='wrong';
					$this->load->view('pages/connexion', $data2);
                }


            }else{
				//redirect('index.php/Utilisateur/formConnexion', 'refresh');
				$data2['erreur']='wrong';
				$this->load->view('pages/connexion', $data2);
			}

        }else {

			//redirect('index.php/Utilisateur/formConnexion', 'refresh');
			$data2['erreur']='empty';
			$this->load->view('pages/connexion', $data2);
        }

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
    	try {


			// je récupère des data dans le body de la requete HTTP
			$role = $this->input->get('role');
			$login = $this->input->post('pseudo');
			$civilite = $this->input->post('civilite');
			$nom = $this->input->post('nom');
			$prenom = $this->input->post('prenom');
			$password = $this->input->post('password');
			$passwordVerif = $this->input->post('password2');
			$email = $this->input->post('email');
			$emailVerif = $this->input->post('email2');
			$telephone = $this->input->post('telephone');
			$presentation = $this->input->post('presentation');


			//echo $role." ".$login." ".$civilite." ".$nom." ".$prenom." ".$password." ".$passwordVerif." ".$email." ".$emailVerif." ".$telephone." ".$presentation;

			// Verification similitude entre les champs mail + mot de passe
			if ($password != $passwordVerif || $email != $emailVerif || $password == "" || $email == "") {
				$this->load->helper('url');
				redirect('Inscription', 'refresh');
			} else {

				//Verification complétude des champs obligatoires
				if ($login != "" && $civilite != "" && $nom != "" && $prenom != "" && $role != "") {

					$this->load->model('Userbdd');


					//var_dump($this->Userbdd->verifMail($email));
					// Vérification existance du mail
                if (!$this->Userbdd->verifMail($email)) {
					echo('existe pas');

					if (!$this->Userbdd->verifLogin($login)) {

						//Cryptage du mot de passe
                    $password = password_hash($password,PASSWORD_DEFAULT);

                    //Verification si enregistrement en base est un succès
						if ($this->Userbdd->creerUtilisateur($login, $civilite, $nom, $prenom, $email, $password, $telephone, $presentation, $role) != 1)
						{
							$this->load->helper('url');
							$this->load->view('layout/header');
							$this->load->view('pages/formCreationUserFail');

						} else {
							$this->load->helper('url');
							$this->load->view('layout/header');
							$this->load->view('pages/formCreationUserSuccess');
						}

					}else {
						$data['erreur']='pseudo';
						$this->load->helper('url');
						$this->load->view('layout/header');

						if($role=='2')
						{
							$this->load->view('pages/formCreationPP', $data);
						}else {
							$this->load->view('pages/formCreationFreelance', $data);
							}
					}

//                	if($role==2){
//						$this->load->helper('url');
//						$this->load->view('layout/header');
//						$data['erreur'] = "email ou login déjà utilisé";
//						$this->load->view('pages/formCreationPP', $data);
//
//
//					}elseif($role==3){
//						$this->load->helper('url');
//						$this->load->view('layout/header');
//						$data['erreur'] = "email ou login déjà utilisé";
//						$this->load->view('pages/formCreationFreelance', $data);
//
//					}
//                } else {
//
//                    //Cryptage du mot de passe
//                    $password = password_hash($password,PASSWORD_DEFAULT);
//
//                    //Verification si enregistrement en base est un succès
//                    if ($this->Userbdd->creerUtilisateur($login, $civilite, $nom, $prenom, $email, $password, $telephone, $presentation, $role) != 1) {
//                        $this->load->helper('url');
//                        $this->load->view('layout/header');
//                        $this->load->view('pages/formCreationUserFail');
//
//                    } else {
//                        $this->load->helper('url');
//                        $this->load->view('layout/header');
//                        $this->load->view('pages/formCreationUserSuccess');
//
//                    }
                }else{
					$data['erreur']='mail';
					$this->load->helper('url');
					$this->load->view('layout/header');

                	if($role=='2'){
						$this->load->view('pages/formCreationPP', $data);
					}else{
						$this->load->view('pages/formCreationFreelance', $data);
					}


				}
				}else{

					$this->load->helper('url');
					redirect('Inscription', 'refresh');
				}


			}

		}catch (\Exception $e){
    		return $e;
		}
    }

    public function tableauAdmin()
    {
		$this->load->helper('url');
		$this->load->view('layout/layout');
        $this->load->view('admin/index');
    }

    public function tableau()
    {
		$this->load->helper('url');
		$this->load->view('layout/layout');
		$this->load->view('admin/index');
    }

    public function detail(){

		$this->load->helper('url');
	}
}
