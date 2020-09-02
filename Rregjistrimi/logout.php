<?php
//inicializo sessionin
  session_start();

// Fshi nje session te caktuar
  unset($_SESSION['username']);

 header('Location: rregjistrimi.php');

  ?>