
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelResidence {
    private $id, $label, $ville, $prix, $personne_id;
    public function __construct($id, $label, $ville, $prix, $personne_id) {
        $this->id = $id;
        $this->label = $label;
        $this->ville = $ville;
        $this->prix = $prix;
        $this->personne_id = $personne_id;
    }
    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getPersonne_id() {
        return $this->personne_id;
    }

    // affichage de toutes les résidences 
   public static function getAll(){
       try{
           $database = Model::getInstance();
           $query = "select P.nom as client_nom, P.prenom as client_prenom, R.label as residence_label, R.ville as residence_ville, R.prix as residence_prix from residence as R, personne as P WHERE R.personne_id = P.id";
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

      public static function getMyResidence($nom, $prenom){
              try{
           $database = Model::getInstance();
           $query = "select R.label as residence_label, R.ville as residence_ville, R.prix as residence_prix from  personne as P, residence as R WHERE P.nom = :nom && P.prenom = :prenom && R.personne_id = P.id ";
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


}
?>
<!-- ----- fin ModelVin -->
