<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Formulaire d'inscription d'un nouveau client</h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "registration");
        form_input_text("nom", "nom", "50", "");
        form_input_text("prenom", "prenom", "50", "");
        form_input_text("login", "login", "50", "");
        form_input_password("password", "password", "50", "");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



