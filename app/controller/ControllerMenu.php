
<!-- ----- debut ControllerClient-->
<?php
require_once '../model/ModelPersonne.php';


class ControllerMenu {
 // Accueil
 public static function menu() {
  include 'config.php';
  $vue = $root . '/app/view/viewMenu.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 // affiche le formulaire de login
  public static function login() {
  include 'config.php';
  $vue = $root . '/app/view/Menu/viewLogin.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 // vérification et login de l'utilisateur
   public static function connexion() {
  include 'config.php';
  $resultat = ModelPersonne::connect($_GET["nom"],$_GET["prenom"], $_GET["login"], $_GET["password"]);
  if ($resultat != -1){
      $_SESSION['login'] = $resultat;
      $_SESSION['Nom'] = $_GET["nom"];
      $_SESSION['Prenom'] = $_GET["prenom"];
  }

  $vue = $root . '/app/view/viewMenu.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 // création d'un compte
  public static function inscription() {
  include 'config.php';
  $vue = $root . '/app/view/viewMenu.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 // déconnexion
  public static function deconnexion() {
  include 'config.php';
  $_SESSION['login'] = 'vide';
  $vue = $root . '/app/view/viewMenu.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerClient -->


