
<!-- ----- debut ModelVin -->

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
   public static function getMyCompte($nom, $prenom, $login){
              try{
           $database = Model::getInstance();
           $query = "select C.id, C.label, C.montant, C.banque_id, C.personne_id from compte as C, personne as P WHERE P.nom = $nom && P.prenom = $prenom && P.login = $login && C.personne_id = P.id ORDER BY C.label;";
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
