
<!-- ----- début viewLogin -->
 
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>


<body>
  <div class="container">
      <h1 class="text-info"> Formulaire de connexion</h1>
    <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
    ?> 

      <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='connexion'>        
        <label class='w-25' for="id">Nom : </label><input type="text" name='nom' size='75' > <br/>                          
        <label class='w-25' for="id">Prenom : </label><input type="text" name='prenom' size='75' > <br/> 
        <label class='w-25' for="id">Login : </label><input type="text" name='login' size='75' >        <br/>
        <label class='w-25' for="id">Password : </label><input type="password" name='password' size='75' >   <br/>    
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewLogin -->



