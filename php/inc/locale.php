<?php
// Script for providing localization
  if (isset($_GET["locale"])) {
    $locale = $_GET["locale"];
  }
  else if (isset($_SESSION["locale"])) {
    $locale  = $_SESSION["locale"];
  }
  else {
    $locale = "de_DE";
  }

  putenv("LANG=" . $locale); 
  setlocale(LC_ALL, $locale);
  
  $domain = "de_DE";
  bindtextdomain($domain, "lang"); 
  bind_textdomain_codeset($domain, 'UTF-8');
 
  textdomain($domain);
 ?>