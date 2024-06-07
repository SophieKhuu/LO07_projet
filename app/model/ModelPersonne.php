
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelPersonne {
    public const ADMINISTRATEUR = 0;
    public const CLIENT = 1;
   
    private $id, $nom, $prenom, $statut, $login, $password;
    public function __construct($id, $nom, $prenom, $statut, $login, $password) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->statut = $statut;
        $this->login = $login;
        $this->password = $password;
    }
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }




}
?>
<!-- ----- fin ModelVin -->
