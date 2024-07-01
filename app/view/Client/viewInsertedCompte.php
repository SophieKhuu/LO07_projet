
<!-- ----- début viewInserted -->
<?php
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>

<body>
  <div class="container">
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le nouveau compte a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>montant = " . $_GET['montant'] . "</li>");
     echo("</ul>");
          echo($results);
    } else {
     echo ("<h3>Problème d'insertion du compte</h3>");
     echo($results);
     echo ("label = " . $_GET['label']);
    }
    ?>
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
    ?>
    <!-- ----- fin viewInserted -->    

    
    