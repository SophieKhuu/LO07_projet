
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelBanque {
    private $id, $label, $pays;    
    public function __construct($id, $label, $pays) {
        $this->id = $id;
        $this->label = $label;
        $this->pays = $pays;
    }
    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getPays() {
        return $this->pays;
    }

    // affichage de toutes les banques
   public static function getAll(){
       try{
           $database = Model::getInstance();
           $query = "select label, pays from banque";
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
       } catch (PDOException $ex) {
           printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
           return NULL;
       }
   }

}
?>
<!-- ----- fin ModelVin -->
