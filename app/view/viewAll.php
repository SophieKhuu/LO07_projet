
<!-- ----- début viewAll -->
<?php

include 'fragment/fragmentHeader.html';
?>

<body>

  <div class="container">
      <?php
       include 'fragment/fragmentMenu.php';
       $cols = $results[0];
       $data = $results[1];
      ?>
      
    <div class="mt-4 p-5 text-white rounded">
    <h1>Patrimoine 2024 </h1>
    <p>Inventaire de vos richesses...</p>
    </div>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
            <?php 
            foreach ($cols as $col){
                echo "<th scope = \"col\">$col</th>\n";
            }
            ?>
        </tr>
      </thead>
      <tbody>
          <?php             
          foreach ($data as $row) {
            echo "<tr>\n";
            foreach ($row as $cle=>$valeur){
                echo "<td scope=\"row\">$valeur</td>\n";
            }
            echo "</tr>\n";
          }
          ?>
      
      </tbody>
    </table>   
      <br>
  </div>

<?php

include 'fragment/fragmentFooter.html';
?>

  <!-- ----- fin viewAll -->
  
  
  