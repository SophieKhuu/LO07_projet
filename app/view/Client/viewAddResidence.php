<?php
require ($root.'/app/view/biblio_formulaire.php');
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>


<body>
  <div class="container">
      <h1 class="text-info"> Délection d'une résidence pour un achat</h1>
    <?php
      form_begin("mt-3", "get" , "router.php");
      form_input_hidden('action', "clientAddedResidence");
        $data = $results[1];
            ?> 
        <label class='fw-bold'>Sélectionner une résidence à acheter : </label> <select class="form-select" name='id' style="width: 500px">
            <?php
            foreach ($data as $row) {
             echo "<option value = ".$row["id"].">";
             printf("%s (%s)" , $row["residence_label"], $row["residence_ville"]);
             echo"</option>";
            }
        echo"</select>";
        form_input_submit("submit");
        form_end();
    ?> 
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



