<!-- ----- début viewFonctionnalite -->
<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Fonctionnalité innovante : affichage du patrimoine d'un client</h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "fonctionnalitePatrimoine");
        $data = $results[1];
        form_select("Sélectionner un client:", "prenom", "", "10", $data, "prenom", $value="prenom");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewFonctionnalite -->
