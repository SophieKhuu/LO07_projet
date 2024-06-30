
<!-- ----- début viewInserted -->
<?php
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>

<body>
  <div class="container">
    <!-- ===================================================== -->
    <?php
    if ($resultat) {
     echo ("<h3>Le nouveau client a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $resultat . "</li>");
     echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>login = " . $_GET['login'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de création de compte client</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    