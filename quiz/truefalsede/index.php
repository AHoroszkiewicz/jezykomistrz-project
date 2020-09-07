<?php
  session_start();
  if (!isset($_SESSION['zalogowany']))
  {
    header('Location: ..');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz </title>
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
<h1>Ich spreche Deutsche nicht<h1>
</html>
