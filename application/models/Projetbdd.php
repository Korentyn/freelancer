<?php
class Projetbdd extends CI_Model {




    public function listerProjetTous() {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM `projet`');

        return $query->result_object();


    }



    public function creerProjet($titre, $presentation, $budget, $tarif_max,$motclef1, $motclef2,
                                $motclef3, $porteur_projet_id)
    {
        $this->load->database();

        $sql = "INSERT INTO `projet` SET `titre`=?, `presentation`=?, `budget`=?, `tarif_hor_max`=?, `mot_cle1`=?,
                 `mot_cle2`=?, `mot_cle3`=?, `porteur_projet_id`=?";
        $query = $this->db->query($sql, array($titre, $presentation, $budget, $tarif_max,$motclef1, $motclef2,
            $motclef3, $porteur_projet_id));



        return $query;
    }




    public function modifierProjet($id_user, $nom, $prenom, $note) {

        $this->load->database();

        $sql = "UPDATE `name` SET `nom`=?, `prenom`=?, `note`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($nom, $prenom, $note));

        return $query;
    }




}
