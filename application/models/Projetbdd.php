<?php
class Projetbdd extends CI_Model {


    public function detailProjet($id){
        $this->load->database();

        $sql = 'SELECT `projet`.`titre`,`projet`.`id`, `projet`.`presentation`, `projet`.`mot_cle`, `utilisateur`.`login`,`utilisateur`.`image`, `budget`.`description`, `technologies`.`titre` AS techno, AVG(`evaluer`.`note`) AS moyenne
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

    public function deviserProjet($id) {
        $this->load->database();

        $sql = '';

        $query = $this->db->query($sql, $id);

        return $query->result_array();
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
