
<!-- ----- debut ControllerAdministrateur-->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerAdministrateur {
    
    // Liste des banques 
    public static function administrateurReadBanque(){
        $results = modelBanque::getAll();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }
    
    public static function administrateurReadClient(){
        $results = ModelPersonne::getClient();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }

    public static function administrateurReadAdministrateur(){
        $results = ModelPersonne::getAdministrateur();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }

    public static function administrateurReadCompte(){
        $results = ModelCompte::getAll();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }    
 
    public static function administrateurReadResidence(){
        $results = ModelResidence::getAll();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    } 
}
?>
<!-- ----- fin ControllerAdministrateur -->


