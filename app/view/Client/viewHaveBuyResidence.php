
<!-- ----- début viewInserted -->
<?php
include $root . '/app/view/fragment/fragmentHeader.html';
include $root . '/app/view/fragment/fragmentMenu.php';
?>

<body>
  <div class="container">
    <!-- ===================================================== -->
    <?php
     echo ("<h3>La résidence a bien été acheté </h3>");
     echo("<ul>");
     echo ("<li>prix dépensé = " . $_GET['prix'] . "</li>");
     echo("</ul>");
    ?>
  </div>
    
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
    ?>
    <!-- ----- fin viewInserted -->    

    
    