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
        form_input_text("label", "label", "100", "", $required="required");
        form_input_text("montant", "montant", "50", "", $required="required");
        /* Ancienne version :
            <label for="id">Sélectionner une banque : </label> <select class="form-control" id='id' name='id' style="width: 500px">
            <?php
            
            foreach ($data as $row) {
             echo "<option value = ".$row["id"].">";
             printf("%s" , $row["label"]);
             echo"</option>";
            }
            ?>
        </select>*/
        $data = $results[1];
        form_select("Sélectionner une banque :", "id", "", "10", $data, "label");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



