<!-- ----- début viewAddBanque -->

<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Formulaire de création d'une nouvelle banque</h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "administrateurInsertedBanque");
        form_input_text("label", "label", "100", "", $required="required");
        form_input_text("pays", "pays", "30", "", $required="required");
        
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAddBanque -->



