 
<!-- ----- debut de la page menu -->
<?php
include 'fragment/fragmentHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include 'fragment/fragmentMenu.php';
    ?>
    <div class="mt-4 p-5 bg-success text-white rounded">
    <h1>Patrimoine 2024 </h1>
    <p>Inventaire de vos richesses... <?php echo   $_SESSION['login']?></p>
    </div>
    <p/>

    </div>   
  
  
  <?php
  include 'fragment/fragmentFooter.html';
  ?>

</body>
</html>
  <!-- ----- fin de la page menu -->
