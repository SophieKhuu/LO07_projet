<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Formulaire de création d'un nouveau compte pour <?php echo $_SESSION['Prenom']." ".$_SESSION['Nom']; ?></h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "clientInsertedCompte");
        form_input_text("label", "label", "100", "");
        form_input_text("montant", "montant", "50", "");
        form_select("Sélectionner une banque", "banque", "", "10", $resultat[1], "id");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



