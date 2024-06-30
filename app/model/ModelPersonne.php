
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
    
    public static function connect($nom,$prenom,$login,$password) {
        try {          
          $database = Model::getInstance();
          $query= "SELECT statut FROM `personne` WHERE nom='$nom' && prenom='$prenom' && login = '$login' && password = '$password';";
          $statement = $database->prepare($query);
          $statement->execute();
          $resultatStatut = $statement->fetch(PDO::FETCH_COLUMN);
          if (isset($resultatStatut)){          return ($resultatStatut);}
        else    {return(-1);}
          }
          

        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return -1;
  }

    }




}
?>
<!-- ----- fin ModelVin -->
