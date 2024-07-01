<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Sélection de la banque dont vous voulez voir les comptes :</h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "administrateurBanqueComptes");
        $data = $results[1];
        form_select("Sélectionner une banque :", "id", "", "10", $data, "label");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewSelectBanque -->



