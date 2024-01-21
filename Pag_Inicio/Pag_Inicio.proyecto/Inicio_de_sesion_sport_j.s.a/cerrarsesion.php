<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location: /Pag_Inicio/Index.html");


?>