<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Achat de la résidence par <?php echo $_SESSION['Prenom']." ".$_SESSION['Nom']; ?></h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "clientHaveBuyResidence");
      form_input_hidden('idResidence', $_GET['id'])*
      form_input_hidden('prix', $prix[0])
           
        ?>
             <label class='fw-bold'>Sélectionner un compte de l'acheteur : </label> <select class="form-select" name='idCompteAcheteur' style="width: 500px">
            <?php
            foreach ($compteAcheteur as $row) {
             echo "<option value = ".$row["id"].">";
             printf("%s" , $row["compte_label"]);
             echo"</option>";
            }
        echo"</select>";
            ?> 
        <label class='fw-bold'>Sélectionner un compte du vendeur : </label> <select class="form-select" name='idCompteVendeur' style="width: 500px">
            <?php
            foreach ($compteVendeur as $row) {
             echo "<option value = ".$row["id"].">";
             printf("%s" , $row["compte_label"]);
             echo"</option>";
            }
        echo"</select>";
        form_input_text("Prix de la résidence :","montant", "50", $prix[0], $required="disabled");
        form_input_submit("submit");
        form_input_reset("reset");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



