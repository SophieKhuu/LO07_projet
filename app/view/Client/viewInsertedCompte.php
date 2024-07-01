
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
     echo ("<li>pays = " . $_GET['montant'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la banque</h3>");
     echo ("label = " . $_GET['label']);
    }
    ?>
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
    ?>
    <!-- ----- fin viewInserted -->    

    
    