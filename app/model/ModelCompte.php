
<!-- ----- debut ModelCompte -->

<?php
require_once 'Model.php';

class ModelCompte {
    private $id, $label, $montant, $banque_id, $personne_id;
    public function __construct($id, $label, $montant, $banque_id, $personne_id) {
        $this->id = $id;
        $this->label = $label;
        $this->montant = $montant;
        $this->banque_id = $banque_id;
        $this->personne_id = $personne_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function getBanque_id() {
        return $this->banque_id;
    }

    public function getPersonne_id() {
        return $this->personne_id;
    }

    // affichage des tous les comptes
   public static function getAll(){
       try{
           $database = Model::getInstance();
           $query = "select P.nom as client_nom, P.prenom as client_prenom, B.label as banque_label, B.pays as banque_pays, C.label as compte_label, C.montant as compte_montant from compte as C, personne as P, banque as B WHERE C.banque_id = B.id and C.personne_id = P.id";
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
   public static function getMyCompte($nom, $prenom){
              try{
           $database = Model::getInstance();
           $query = "select B.label as banque_label, B.pays as banque_pays, C.label as compte_label, C.montant as compte_montant from compte as C, personne as P, banque as B WHERE P.nom = :nom && P.prenom = :prenom && C.personne_id = P.id && C.banque_id = B.id ORDER BY C.label";
           $statement= $database->prepare($query);
           $statement->execute([
                'nom' => $nom,
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
   
    public static function insertCompte($label,$montant,$idBanque, $nom, $prenom){        
    try {
    $database = Model::getInstance();

    // recherche de la valeur de la clé = max(id) + 1
    $query = "select max(id) from compte";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $id = $tuple['0'];
    $id++;
    
    //recherche de la personne id
    $query = "select id from personne where nom = :nom  and  prenom = :prenom";
    $statement = $database->prepare($query);
    $statement->execute([
        'nom' => $nom,
        'prenom' =>$prenom
    ]);
    $tuple = $statement->fetch(PDO::FETCH_ASSOC);
    $idPersonne = $tuple['id'];
    
    
    // ajout d'un nouveau tuple;
    $query = "insert into compte value (:id, :label, :montant, :banque_id, :personne_id)";
    $statement = $database->prepare($query);
    $statement->execute([
     'id' => $id,
     'label' => $label,
     'montant' => $montant,
     'banque_id' => $idBanque,
     'personne_id' => $idPersonne
   ]);
   return ($idPersonne);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return null;
  }
        
   }

   public static function getBanqueComptes($id){
       try{
           $database = Model::getInstance();
           $query = "SELECT P.prenom, P.nom, B.label as banque, C.label as compte, C.montant from personne as P, banque as B, compte as C WHERE B.id = :id AND C.banque_id = B.id AND C.personne_id = P.id";
           $statement= $database->prepare($query);
           $statement->execute([
                'id' => $id
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
<!-- ----- fin ModelCompte -->
