<?php
class Userbdd extends CI_Model {




    public function listerUserTous() {

        $this->load->database();


        // Sélectionne login, presentation, image, techno, moyenne
        $query = $this->db->query('SELECT `utilisateur`.`login`,`utilisateur`.`id`, `utilisateur`.`presentation`,`utilisateur`.`image`, GROUP_CONCAT(`technologies`.`titre`) AS techno, AVG(`evaluer`.`note`) AS moyenne
FROM `utilisateur` 

	LEFT JOIN `evaluer` ON `utilisateur`.`id` = `evaluer`.`utilisateur_id_target`
    LEFT JOIN `utiliser` ON `utiliser`.`utilisateur_id` = `utilisateur`.`id`
    LEFT JOIN `technologies` ON `utiliser`.`technologies_id` = `technologies`.`id`
    where `utilisateur`.`banni`=0 AND `utilisateur`.`role_id`=3');

        return $query->result_array();


    }



    public function creerUtilisateur($login, $civilite, $nom, $prenom, $email, $password, $telephone, $presentation, $role)
    {
        $this->load->database();

        $sql = "INSERT INTO `utilisateur` (`login`,`civilite`,`nom`, `prenom`, `mail`, `password`, `telephone`, `presentation`, `role_id`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$query = $this->db->query($sql, array($login,$civilite,$nom,$prenom,$email,$password,$telephone,$presentation,$role));
        return $query;
    }


    public function verifUtilisateur($mail)
	{
        $this->load->database();
        $sql = "SELECT * FROM `utilisateur` WHERE `mail`=?";
        $query = $this->db->query($sql, $mail);
        return $query->result_object();
    }


    public function verifMail($mail)
	{
	$this->load->database();

	//Verification email existe
	$sql = 'SELECT * FROM `utilisateur` WHERE `utilisateur`.`mail`=?';
	$query = $this->db->query($sql, $mail);


		return $query->result_array();
}

	public function verifLogin($login)
	{
		$this->load->database();

		//Verification email existe
		$sql = 'SELECT * FROM `utilisateur` WHERE `utilisateur`.`login`=?';
		$query = $this->db->query($sql, $login);


		return $query->result_array();
	}


    public function modifierUser($id_user, $nom, $prenom, $note) {

        $this->load->database();

        $sql = "UPDATE `name` SET `nom`=?, `prenom`=?, `note`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($nom, $prenom, $note));

        return $query;
    }




}
