
<!-- ----- debut ControllerClient-->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerClient {
    // Liste des banques 
    public static function clientReadMyCompte(){
        $results = ModelCompte::getMyCompte($_SESSION['Nom'], $_SESSION['Prenom']);
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerClient : clientReadMyCompte : vue = $vue");
    require ($vue);
    }
    
    // Affiche le formulaire pour ajouter un nouveau compte
    public static function clientAddCompte(){    
    include 'config.php';
    $results = ModelBanque::getAll();
    $vue = $root . '/app/view/Client/viewInsertCompte.php';
    if (DEBUG)
    echo ("ControllerClient : clientAddCompte : vue = $vue");
    require ($vue);
    }
    
    // Transmet les informations pour la création d'un nouveau compte et affiche la page du compte créé
    public static function clientInsertedCompte(){
    include 'config.php';
    $results = ModelCompte::insertCompte(
          htmlspecialchars($_GET['label']), htmlspecialchars($_GET['montant']), htmlspecialchars($_GET['id']),  htmlspecialchars($_SESSION['Nom']),  htmlspecialchars($_SESSION['Prenom']));
 
    $vue = $root . '/app/view/Client/viewInsertedCompte.php';
    if (DEBUG)
    echo ("ControllerMenu : menu : vue = $vue");
    require ($vue);
        
    }
    
    public static function clientTransfertCompte(){    
    include 'config.php';
    $results = ModelCompte::getMyCompteWithID(htmlspecialchars($_SESSION['Nom']),  htmlspecialchars($_SESSION['Prenom']));
    if(count($results[1])>1){
    $vue = $root . '/app/view/Client/viewTransfertCompte.php';
    }
    else{
    $vue = $root . '/app/view/Client/viewErreurTransfertCompte.php';    
    }
    if (DEBUG)
    echo ("ControllerClient : clientAddCompte : vue = $vue");
    require ($vue);
    }
    
    public static function clientTransferedCompte(){
    include 'config.php';
    if($_GET['montant']=='' or $_GET['montant']=='0' or $_GET['id1']=='' or $_GET['id2']=='' or  $_GET['id1']== $_GET['id2']){
            $vue = $root . '/app/view/Client/viewErreurTransfertCompte.php';   
    }
    else{
    $results = ModelCompte::transfertCompte(
          htmlspecialchars($_GET['montant']), $_GET['id1'], $_GET['id2']);
 
    $vue = $root . '/app/view/Client/viewTransferedCompte.php';
    }
    if (DEBUG)
    echo ("ControllerMenu : menu : vue = $vue");
    require ($vue);
        
    }

    // Liste des résidences du client
    public static function clientReadMyResidence(){
        $results = ModelResidence::getMyResidence($_SESSION['Nom'], $_SESSION['Prenom']);
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerClient : clientReadMyCompte : vue = $vue");
    require ($vue);
    }    

    // Affiche le patrimoine du client 
    public static function clientReadPatrimoine(){
        $results = ModelCompte::getMyPatrimoine($_SESSION['Nom'], $_SESSION['Prenom']);
        include 'config.php';
        $vue = $root.'/app/view/viewAll.php';
    if (DEBUG)
        echo ("ControllerClient : clientReadMyCompte : vue = $vue");
    require ($vue);
    }
}
?>
<!-- ----- fin ControllerClient -->


