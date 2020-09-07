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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Językomistrz - Profil</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/main1.css">
    <link rel="shortcut icon" href="../img/icon.png">

  </head>
  <body>
    <header> <!-- MENU -->
      <nav class="navbar navbar-dark bg-primary navbar-expand-lg sticky-top">

        <a class="navbar-brand" href="../user"><img src="../img/logo1.svg" class="d-inline-block" height="100" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="#mainmenu" aria-expended="false" aria-label="Przełącznik nawigacji">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainmenu">
          <ul class="navbar-nav ml-auto">

            <li class="nav-itemX" >
              <a class="nav-link" href="../user"> Strona Główna </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../quiz"> Quiz </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="."> Profil </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../contact"> Kontakt </a>
              </li>
              <li class="nav-item">
              </li>
            </ul>
            <a href='../logout.php'><button type="button" class="btn btn-outline-light btn-md" data-toggle="modal">Wyloguj się</button></a>

          </div>
      </nav>

    </header><!--MENU -->

    <div style="background-color: lightgrey; radius: 5px;" class="container my-5">
      <h1 class="header">Panel użytkownika</h1>
      <hr>
      <?php
      require_once '../danebazy.php';
      mysqli_report(MYSQLI_REPORT_STRICT);
      try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie->connect_errno!=0){
          throw new Exception(mysqli_connect_errno());
        }else {
          $id=$_SESSION['id_user'];
          //        echo $id;
          $x=$polaczenie->query("SELECT quiz_pl_inf FROM konta WHERE id=$id");
          $y=$x->fetch_row()[0];
          if ($y==1) {
            echo "Quiz z języka polskiego(Informatyka): zdany";
          }else {
            echo "Quiz z języka polskiego(Informatyka): niezdany";
          }
        }

      } catch (\Exception $e) {
        echo 'Błąd serwera, zapraszamy w innym terminie';
      }

      ?>
      <div class="row my-5 py-4">

        <!--Grid column-->
        <!--Grid column-->

      </div>
      <!--Grid row-->
    </div>
    <footer class="footer sticky-bottom"><!-- Footer -->
      <div class="container-fluid bg-primary">
        <div class="container py-2">
          <div class="row">
            <hr>
          </div>
          <div class="row text-center">
            <div class="col-lg-4 my-4">
              <h4 class="mb-5">Kontakt</h4>
              <p>przykład@gmail.com</p>
              <p>Telefon +48666554343</p>
              <p>Infolinia czynna:</p>
              <p>Pon - Pt (8:00 - 15:00)</p>
            </div>
            <div class="col-lg-4 my-4">
              <h4 class="mb-5">Wsparcie</h4>
              <div class="input-group">
                <input class="input-group" type="email" name="" value="" placeholder="e-mail">
                <textarea class="input-group" name="name" rows="4" cols="35" placeholder="napisz do nas"></textarea>
                <button class="btn btn-success ml-auto" type="button" name="button">Wyślij</button>
              </div>
            </div>
            <div class="col-lg-4 my-4">
              <h4 class="mb-5">Twórcy</h4>
              <p>Adam Horoszkiewicz</p>
              <p>Kacper Stolpe</p>
              <p>Damian Staszak</p>
            </div>
          </div>
          <div class="row">
            <hr>
          </div>
        </div>
      </div>
      <div class="container-fluid sticky-bottom text-muted text-center bg-dark py-2">© 2019 Copyright</div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
