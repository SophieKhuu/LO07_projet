
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

   

}
?>
<!-- ----- fin ModelVin -->
