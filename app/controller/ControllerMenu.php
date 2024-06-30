
<!-- ----- debut ControllerClient-->
<?php

class ControllerMenu {
 // Accueil
 public static function caveAccueil() {
  include 'config2.php';
  $vue = $root . '/app/view/viewMenu.php';
  if (DEBUG)
   echo ("ControllerMenu : Menu : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerClient -->


