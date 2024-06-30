
<!-- ----- début viewLogin -->
 
<?php 
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Formulaire de connexion</h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "connexion");
        form_input_text("nom", "nom", "50", "");
        form_input_text("prenom", "prenom", "50", "");
        form_input_text("login", "login", "50", "");
        form_input_password("password", "password", "50", "");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



