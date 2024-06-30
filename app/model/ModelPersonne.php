
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
          $query= "SELECT nom, prenom, statut FROM `personne` WHERE nom='$nom' && prenom='$prenom' && login = '$login' && password = '$password';";
          $statement = $database->prepare($query);
          $statement->execute();
          $resultatStatut = $statement->fetch(PDO::FETCH_ASSOC);
          if ($resultatStatut != NULL){          
              return ($resultatStatut);}
          else    {
              return NULL;}
          }
          

        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
  }

    }

    // affichage des clients
   public static function getClient(){
       try{
           $database = Model::getInstance();
           $query = "select nom, prenom, login, password from personne WHERE statut=1";
           $statement= $database->prepare($query);
           $statement->execute();
            // tableau "data" associatif contenant les données
           $data = $statement->fetchAll(PDO::FETCH_ASSOC);
           // tableau "cols" contenant les noms des colonnes 
           $cols = array(); 
           for ($i=0; $i<= $statement->columnCount()-1; $i++){
                $cols[$i] = $statement->getColumnMeta($i)['name'];
            }
            // fusion des deux tableaux en un grand tableau pour transmettre les résultats
            $results = array($cols, $data);
           return $results;
       } catch (PDOException $e) {
           printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
           return NULL;
       }
   }

   public static function getAdministrateur(){
       try{
           $database = Model::getInstance();
           $query = "select nom, prenom, login, password from personne WHERE statut=0";
           $statement= $database->prepare($query);
           $statement->execute();
            // tableau "data" associatif contenant les données
           $data = $statement->fetchAll(PDO::FETCH_ASSOC);
           // tableau "cols" contenant les noms des colonnes 
           $cols = array(); 
           for ($i=0; $i<= $statement->columnCount()-1; $i++){
                $cols[$i] = $statement->getColumnMeta($i)['name'];
            }
            // fusion des deux tableaux en un grand tableau pour transmettre les résultats
            $results = array($cols, $data);
           return $results;
       } catch (PDOException $e) {
           printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
           return NULL;
       }
   }

}
?>
<!-- ----- fin ModelVin -->
