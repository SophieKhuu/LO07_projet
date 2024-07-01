<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Formulaire de transfert entre deux comptes <?php echo $_SESSION['Prenom']." ".$_SESSION['Nom']; ?></h1>
    <?php
      $data = $results[1];
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "clientTransferedCompte");
      form_input_text("montant", "montant", "50", "");
        //form_select("Sélectionner un compte (le donneur) :", "compte_label", "", "", $data, "compte_label");
      
        ?>
             <label class='fw-bold'>Sélectionner un compte (le donneur) : </label> <select class="form-select" name='id1' style="width: 500px">
            <?php
            foreach ($data as $row) {
             echo "<option value = ".$row["id"].">";
             printf("%s" , $row["compte_label"]);
             echo"</option>";
            }
        echo"</select>";
            ?> 
        <label class='fw-bold'>Sélectionner un compte différent (le receveur) : </label> <select class="form-select" name='id2' style="width: 500px">
            <?php
            foreach ($data as $row) {
             echo "<option value = ".$row["id"].">";
             printf("%s" , $row["compte_label"]);
             echo"</option>";
            }
        echo"</select>";
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



