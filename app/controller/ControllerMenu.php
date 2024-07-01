
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
  if ($resultat != NULL){
      $_SESSION['login'] = $resultat["statut"];
      $_SESSION['Nom'] = $resultat["nom"];
      $_SESSION['Prenom'] = $resultat["prenom"];
  }

  $vue = $root . '/app/view/viewMenu.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 // formulaire de création d'un compte
  public static function inscription() {
  include 'config.php';
  $vue = $root . '/app/view/Menu/viewRegistration.php';
  if (DEBUG)
   echo ("ControllerMenu : menu : vue = $vue");
  require ($vue);
 }
 
 // création du compte
   public static function registration() {
  include 'config.php';
  $results = ModelPersonne::insertClient(
          htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['login']), htmlspecialchars($_GET['password']));
 
  $vue = $root . '/app/view/Client/viewRegistred.php';
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
 
 public static function fonctionnalite(){
  $results = ModelPersonne::getClient();
  include 'config.php';
  $vue = $root . '/app/view/Innovations/viewFonctionnalite.php';
  if (DEBUG)
   echo ("ControllerMenu : fonctionnalite : vue = $vue");
  require ($vue);
 }
 
  public static function fonctionnalitePatrimoine(){
  $results = ModelPersonne::getPatrimoine(htmlspecialchars($_GET['prenom']));
  include 'config.php';
  $vue = $root . '/app/view/viewAll.php';
  if (DEBUG)
   echo ("ControllerMenu : fonctionnalitePatrimoine : vue = $vue");
  require ($vue);
 }
 
  
 public static function amelioration(){
  include 'config.php';
  $vue = $root . '/app/view/Innovations/viewAmelioration.php';
  if (DEBUG)
   echo ("ControllerMenu : fonctionnalite : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerClient -->


