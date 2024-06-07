
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





}
?>
<!-- ----- fin ModelVin -->
