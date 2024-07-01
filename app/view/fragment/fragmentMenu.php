
<!-- ----- début fragmentMenu -->
<?php
require_once '../model/ModelPersonne.php';
?>
<nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router.php?action='menu'">HUGOT - KHUU
            <?php
                    if ($_SESSION["login"]== ModelPersonne::ADMINISTRATEUR){
                        echo "|| Administrateur || ".$_SESSION['Nom']. " ". $_SESSION['Prenom'];
                    }
                    elseif ($_SESSION["login"]== ModelPersonne::CLIENT){
                        echo "|| Client || ".$_SESSION['Nom']. " ". $_SESSION['Prenom'];
                    }
?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
        <?php

        if ($_SESSION["login"]== ModelPersonne::ADMINISTRATEUR){
            include'fragmentMenuAdministrateur.html';
        }
        elseif ($_SESSION["login"]== ModelPersonne::CLIENT) {
            include 'fragmentMenuClient.html';
        }
        ?>
        
          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=afaire">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router.php?action=afaire">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=login">login</a></li>
            <li><a class="dropdown-item" href="router.php?action=inscription">s'inscrire</a></li>
            <li><a class="dropdown-item" href="router.php?action=deconnexion">deconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentMenu -->

