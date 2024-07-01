
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
   
    // Affiche le formulaire pour la création d'une banque
    public static function administrateurAddBanque(){
        include 'config.php';
        $vue = $root . '/app/view/Administrateur/viewAddBanque.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : administrateurAddBanque : vue = $vue");
        require ($vue);
    }

    // Récupère les infos pour la création d'une nouvelle banque
    public static function administrateurInsertedBanque(){
        if (($_GET['label'] == '') or ($_GET['pays'] == '')){
            $results = False;
        }
        else {
            $results = ModelBanque::insert(
        htmlspecialchars($_GET['label']), htmlspecialchars($_GET['pays']));
        }
        include 'config.php';
        $vue = $root . '/app/view/Administrateur/viewInsertedBanque.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : administrateurAddBanque : vue = $vue");
        require ($vue);
    }
    // Liste des clients
    public static function administrateurReadClient(){
        $results = ModelPersonne::getClient();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }

    // Liste des administrateurs
    public static function administrateurReadAdministrateur(){
        $results = ModelPersonne::getAdministrateur();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }

    // Liste des comptes
    public static function administrateurReadCompte(){
        $results = ModelCompte::getAll();
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerAdministrateur : administrateurReadBanque : vue = $vue");
    require ($vue);
    }    
 
    // Liste des résidences
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


