
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




}
?>
<!-- ----- fin ModelVin -->
