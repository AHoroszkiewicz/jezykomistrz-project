<?php
session_start();
if(!isset($_SESSION['udanarejestracja']))
{
  header('Location: ..');
  exit();
}else {
  unset($_SESSION['udanarejestracja']);
}
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Językomistrz - Dziękujemy za rejestrację</title>
    <link rel="shortcut icon" href="./img/icon.png">
    <link rel="stylesheet" href="./style/main1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    Dziękujemy za rejestrację!
          <?php
        header("refresh:1,url=http://localhost/projekt_x/");
      ?>
  </body>
</html>
