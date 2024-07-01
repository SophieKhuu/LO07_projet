
<!-- ----- debut ModelPersonne -->

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
    
    // cherche dans la base de donnée l'existence d'un client
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
    
    // créer un client
    public static function insertClient($nom,$prenom,$login,$password){
        
    try {
    $database = Model::getInstance();

    // recherche de la valeur de la clé = max(id) + 1
    $query = "select max(id) from personne";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $id = $tuple['0'];
    $id++;

    // ajout d'un nouveau tuple;
    $query = "insert into personne value (:id, :nom, :prenom, :statut, :login, :password)";
    $statement = $database->prepare($query);
    $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'statut' => self::CLIENT,
     'login' => $login,
     'password' => $password
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return null;
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

   // affichage de tous les administrateurs
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

   public static function getPatrimoine($prenom){
              try{
           $database = Model::getInstance();
           $query = "SELECT * , SUM(Valeur) over(ORDER BY Valeur) AS Capital 
                        from (
                                SELECT 'compte' as Catégorie, C.label, C.montant as Valeur 
                                        FROM compte as C, personne as P 
                                        WHERE C.personne_id= P.id AND P.prenom = :prenom 
                            UNION 
                                SELECT 'résidence' as Catégorie, R.label, R.prix as Valeur 
                                        FROM residence as R, personne as P 
                                        WHERE R.personne_id=P.id AND P.prenom = :prenom
                            ) 
                        as patrimoine ";
           $statement= $database->prepare($query);
           $statement->execute([
               'prenom' => $prenom
            ]);
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
<!-- ----- fin ModelPersonne -->
