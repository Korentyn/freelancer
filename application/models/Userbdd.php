<?php
class Userbdd extends CI_Model {




    public function listerUserTous() {

        $this->load->database();

        $query = $this->db->query('SELECT * FROM `utilisateur`');

        return $query->result_object();


    }



    public function creerUtilisateur($login, $civilite, $nom, $prenom, $email, $password, $telephone, $presentation, $role)
    {
        $this->load->database();

        $query = $this->db->query("INSERT INTO `utilisateur` (`login`,`civilite`,`nom`, `prenom`, `mail`, `password`, `telephone`, `presentation`, `role_id`) 
        VALUES ('$login', '$civilite', '$nom', '$prenom', '$email', '$password', '$telephone', '$presentation', '$role')");

        return $query;
    }

    public function verifCreationUtilisateur($login, $mail){
        $this->load->database();

        $sql = 'SELECT * FROM `utilisateur` WHERE `utilisateur`.`login`=?';
        $query = $this->db->query($sql, $login);

        $sql2 = 'SELECT * FROM `utilisateur` WHERE `utilisateur`.`mail`=?';
        $query2 = $this->db->query($sql2, $mail);

        var_dump($query);
        //Si mail ou login existe en base de données, on renvoie 1, sinon 0
//        if($query != 1 || $query2 != 1){
//            return 0;
//        }else{
//            return 1;
//        }
    }


    public function modifierUser($id_user, $nom, $prenom, $note) {

        $this->load->database();

        $sql = "UPDATE `name` SET `nom`=?, `prenom`=?, `note`=? WHERE id=".$id_user;
        $query = $this->db->query($sql, array($nom, $prenom, $note));

        return $query;
    }




}
