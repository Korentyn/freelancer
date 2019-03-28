<?php
class Projetbdd extends CI_Model {


    public function detailProjet($id){
        $this->load->database();

        $sql = 'SELECT `projet`.`titre`,`projet`.`id`, `projet`.`presentation`, `projet`.`mot_cle`, `utilisateur`.`login`,`utilisateur`.`image`, `budget`.`description` AS budget, `technologies`.`titre` AS techno, AVG(`evaluer`.`note`) AS moyenne
        FROM `projet`

        LEFT JOIN `utilisateur` ON `projet`.`porteur_projet_id` = `utilisateur`.`id`
        LEFT JOIN `evaluer` ON `utilisateur`.`id` = `evaluer`.`utilisateur_id_target`
        LEFT JOIN `budget` ON `projet`.`budget` = `budget`.`id`
        LEFT JOIN `caracteriser` ON `projet`.`id` = `caracteriser`.`projet_id`
        LEFT JOIN `technologies` ON  `technologies`.`id` = `caracteriser`.`technologies_id`
        where `projet`.`id`=?';

        $query = $this->db->query($sql, $id);

        return $query->result_array();

    }

    public function detailProjetCree($id_projet){
        $this->load->database();
        $sql = 'SELECT `projet`.`titre`,`projet`.`id`, `projet`.`presentation`, `projet`.`mot_cle`, `budget`.`description` AS budget, `technologies`.`titre` AS techno
        FROM `projet`

        LEFT JOIN `budget` ON `projet`.`budget` = `budget`.`id`
        LEFT JOIN `caracteriser` ON `projet`.`id` = `caracteriser`.`projet_id`
        LEFT JOIN `technologies` ON  `technologies`.`id` = `caracteriser`.`technologies_id`
        where `projet`.`id`=?';
        $query = $this->db->query($sql, $id_projet);

        return $query->result_array();
}

    public function devisProjetCree($id_projet){
        $this->load->database();
        $sql = 'SELECT `devis`.`id`, `devis`.`date_creation`, `devis`.`tarif_hor2`,`devis`.`competence`, `devis`.`prix`, `utilisateur`.`login`,`utilisateur`.`image`, `lot`.`date_deploiement`, `lot`.`url_lot`, `lot`.`commentaire`, `lot`.`titre` AS contenu_lot, `lot`.`etat`, `lot`.`prix` AS prixlot
        FROM `devis` 

        LEFT JOIN `utilisateur` ON `devis`.`utilisateur_id` = `utilisateur`.`id`
        LEFT JOIN `lot` ON `devis`.`id`= `lot`.`devis_id`


        WHERE `devis`.`id_projet`=?';
        $query = $this->db->query($sql, $id_projet);
        $rowcount = $query->num_rows();

        return $query->result_array();
    }

    public function listerMesProjets($utilisateur_id){
		$this->load->database();
		$sql = 'SELECT `projet`.`titre`,`projet`.`id`, `projet`.`presentation`, `projet`.`mot_cle`, `utilisateur`.`login`,`utilisateur`.`image`, `budget`.`description`, 
				(SELECT COUNT(*) FROM `devis` WHERE `devis`.`id_projet`=`projet`.`id`) AS totalrep, (SELECT COUNT(*) FROM `devis` WHERE `devis`.`id_projet`=`projet`.`id`and `devis`.`etat`=1) AS nouvrep
    FROM `projet`

    LEFT JOIN `utilisateur` ON `projet`.`porteur_projet_id` = `utilisateur`.`id`
    LEFT JOIN `budget` ON `projet`.`budget` = `budget`.`id`
    where `projet`.`porteur_projet_id`=?';

		$query = $this->db->query($sql, $utilisateur_id);
		return $query->result_array();
	}

    public function deviserProjet($tarif_hor, $heures, $prix_devis, $utilisateur_id, $projet_id, $date_deploiement, $prix_lot, $titre_lot, $competence)
    {
        $this->load->database();
        $accepte = 0;
        $etat = 1;

        $sql = 'INSERT INTO `devis` ( `tarif_hor2`, `prix`, `heures`, `accepte`, `etat`, `utilisateur_id`, `id_projet`, `competence`) 
                VALUES ( ?, ?, ?, ?, ?, ?, ?, ?);';

        $query = $this->db->query($sql, array($tarif_hor, $prix_devis, $heures, $accepte, $etat, $utilisateur_id, $projet_id, $competence));

        if ($query !=1){
            return 0;
        }else {
            $last_insert = $this->db->insert_id();
            $queryArr = array();
            $arr_count = sizeof($date_deploiement);

                    for ($i=0; $i<$arr_count; $i++) {

                            $date = $date_deploiement[$i];
                            $titre = $titre_lot[$i];

                            $sql = "INSERT INTO `lot` (`date_deploiement`, `etat`, `prix`, `devis_id`, `titre`) 
                    VALUES ( ?, '1', ?, ?, ?)";
                            $queryArr[$i] = $this->db->query($sql, array($date, $prix_lot, $last_insert, $titre));

                    }

                return $queryArr;
            }
    }

    public function listerProjetTous() {

        $this->load->database();

        $query = $this->db->query('SELECT `projet`.`titre`,`projet`.`id`, `projet`.`presentation`, `projet`.`mot_cle`, `utilisateur`.`login`,`utilisateur`.`image`, `budget`.`description`
FROM `projet`

    LEFT JOIN `utilisateur` ON `projet`.`porteur_projet_id` = `utilisateur`.`id`
    LEFT JOIN `budget` ON `projet`.`budget` = `budget`.`id`
    where `projet`.`etat`=1');


        $result = $query->result_array();
        return $result;


    }

    public function listerBudget() {

        $this->load->database();

        $query = $this->db->query("SELECT * FROM `budget`");


        $result = $query->result_array();
        return $result;


    }

    public function listerTechnologies(){
        $this->load->database();

        $query = $this->db->query("SELECT * FROM `technologies`");

        $result = $query->result_array();
        return $result;
    }

    //Insérer projet en bdd
    public function creerProjet($titre, $description, $budget, $motcle, $porteur_projet_id, $competence)
    {
        $this->load->database();
        $sql = "INSERT INTO `projet` SET `titre`=?, `presentation`=?, `budget`=?, `mot_cle`=?,
                  `porteur_projet_id`=?";
        $query = $this->db->query($sql, array($titre, $description, $budget, $motcle, $porteur_projet_id));

        if ($query !=1){
            return 0;
        }else{
           $last_insert = $this->db->insert_id();
           $sql = "INSERT INTO `caracteriser` SET `technologies_id`=?, `projet_id`=?";
          return $query = $this->db->query($sql, array($competence, $last_insert));
        }
    }

    public function attribuerProjetTechnologies($titre, $idTechno){

}

    public function creerInfos($date, $url, $titre, $projetId){
        $this->load->database();

        $sql = "INSERT INTO `infos` SET `date`=?, `url`=?, `titre`=?, `projet_id`=?";
        $query = $this->db->query($sql, array($date, $url, $titre, $projetId));



        return $query->result_object();

    }





    public function modifierProjet($id_user, $nom, $prenom, $note) {

        $this->load->database();

        $sql = "UPDATE `name` SET `nom`=?, `prenom`=?, `note`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($nom, $prenom, $note));

        return $query;
    }




}
