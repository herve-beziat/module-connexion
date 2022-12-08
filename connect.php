<?php
session_start();
// $user='root';
// $mdp='';
// $db='moduleconnexion';
// $server='localhost';

$mySqli = new mysqli('localhost', 'root', '', 'moduleconnexion');

// $mySqli = new mysqli('localhost', 'herve-beziat', 'F06!87bli', 'herve-beziat_moduleconnexion');


if ($mySqli) {
    // echo "connexion établie <br />";
  }
  else { 
    die(mysqli_connect_error());
  }

?>