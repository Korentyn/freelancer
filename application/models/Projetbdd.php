<?php
class Projetbdd extends CI_Model {




    public function listerProjetTous() {

        $this->load->database();

        $query = $this->db->query('SELECT `projet`.`titre`, `projet`.`presentation`, `projet`.`mot_cle`, `utilisateur`.`login`, `budget`.`description`
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

    public function creerProjet($titre, $description, $budget, $motclef1, $motclef2,
                                $motclef3, $porteur_projet_id)
    {
        $this->load->database();

        $sql = "INSERT INTO `projet` SET `titre`=?, `presentation`=?, `budget`=?, `mot_cle1`=?,
                 `mot_cle2`=?, `mot_cle3`=?, `porteur_projet_id`=?";
        $query = $this->db->query($sql, array($titre, $description, $budget, $motclef1, $motclef2,
            $motclef3, $porteur_projet_id));



        return $query;
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
