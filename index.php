<?php
session_start();
$_SESSION['login'] = 'vide';
$_SESSION['Nom'] = 'vide';
$_SESSION['Prenom'] = 'vide';
header('Location: app/router/router.php?action=truc');
?>
