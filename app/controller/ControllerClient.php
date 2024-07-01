
<!-- ----- debut ControllerClient-->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerClient {
    // Liste des banques 
    public static function clientReadMyCompte(){
        $results = ModelCompte::getMyCompte($_SESSION['Nom'], $_SESSION['Prenom'], $_SESSION['login']);
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerClient : clientReadMyCompte : vue = $vue");
    require ($vue);
    }
    
    public static function clientAddCompte(){    
    include 'config.php';
    $resultat = ModelBanque::getAll();
    $vue = $root . '/app/view/Client/viewInsertCompte.php';
    if (DEBUG)
    echo ("ControllerClient : clientAddCompte : vue = $vue");
    require ($vue);
    }
    
    public static function clientInsertedCompte(){
        
    }
 
}
?>
<!-- ----- fin ControllerClient -->


