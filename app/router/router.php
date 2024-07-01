
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerClient.php');
require ('../controller/ControllerMenu.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

//Modification du routeur pour prendre en compte l'ensemble des paramètres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

session_start();

// --- Liste des méthodes autorisées
switch ($action) {
 // Taches pour le menu de base
 case "login":
 case "connexion":
 case "inscription":
 case "registration":
 case "deconnexion":
     ControllerMenu::$action($args);
     break;
 // Taches pour l'administrateur
 case "administrateurReadBanque":
 case "administrateurAddBanque":
 case "administrateurInsertedBanque":
 case "administrateurReadClient":
 case "administrateurReadAdministrateur":
 case "administrateurReadCompte": 
 case "administrateurReadResidence": 
     ControllerAdministrateur::$action($args);
     break;
 // Taches pour le client
 case "clientReadMyCompte":
 case "clientAddCompte":
 case "clientInsertedCompte":
 case "clientExchangeCompte":
 case "clientReadMyResidence": 
 case "clientAddResidence":
 case "clientReadPatrimoine":
     ControllerClient::$action($args);
     break;
 // Tache par défaut
 default:
  $action = "menu";
  ControllerMenu::$action($args);
}
?>
<!-- ----- Fin Router -->

