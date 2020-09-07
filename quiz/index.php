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
    <title>Językomistrz</title>

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

            <li class="nav-item" >
              <a class="nav-link" href="../user"> Strona Główna </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../quiz"> Quiz </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../profil"> Profil </a>
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



 <div class="container m-auto">


          <form class="main-form" method="post">
            <div class="container my-5">
              <div class="col-4 text-center m-auto">

                <div class="form-group center-block btn-group-vertical">
                  <h2 class="text-center my-4">Wybierz język quizu</h2>
                  <button class="from-control btn btn-light btn-lg text-uppercase my-2" formaction="./pl"> Polski </button>
                  <button class="from-control btn btn-light btn-lg text-uppercase my-2" formaction="./truefalseen"> Angielski </button>
                  <button class="from-control btn btn-light btn-lg text-uppercase my-2" formaction="./truefalsesp" disabled> Hiszpański </button>
                  <button class="from-control btn btn-light btn-lg text-uppercase my-2" formaction="./truefalsede" disabled> Niemiecki </button>
                </div>
              </div>
            </div>
          </form>
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
