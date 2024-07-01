
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
     echo ("<h3>Le transfert a été effectuée </h3>");
     echo("<ul>");
     echo ("<li>montant transféré entre les deux = " . $results . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de transfert de compte</h3>");
     echo ("<li>montant = " . $_GET['montant'] . "</li>");
    }
    ?>
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
    ?>
    <!-- ----- fin viewInserted -->    

    
    