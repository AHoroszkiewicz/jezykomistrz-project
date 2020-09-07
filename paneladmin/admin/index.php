<!-- strona główna jako admin/root -->
<?php
session_start();
if (!isset($_SESSION['zalogowany']))
{
  header('Location: ../..');
  exit();
}
if ($_SESSION['upraw']<3)
{
  header('Location: ../..');
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Językomistrz - Panel Admina</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/main1.css">
    <link rel="shortcut icon" href="../../img/icon.png">

  </head>
  <body>
    <header> <!-- MENU -->
      <nav class="navbar navbar-dark bg-primary navbar-expand-lg sticky-top">

        <a class="navbar-brand" href=".."><img src="../../img/logo2.svg" class="d-inline-block" height="100" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="#mainmenu" aria-expended="false" aria-label="Przełącznik nawigacji">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainmenu">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item" >
              <a class="nav-link" href=".."> Strona Główna </a>
            </li>
            <li class="nav-item dropdown">
              <li class="nav-item active">
                <a class="nav-link" href="."> Panel Admina </a>
              </li>
              <li class="nav-item">
              </li>
            </ul>
            <a href='../../logout.php'><button type="button" class="btn btn-outline-light btn-md" data-toggle="modal">Wyloguj się</button></a>

          </div>
      </nav>

    </header><!--MENU -->

    <div class="container my-5">

      <?php
      echo "Jesteś zalogowany jako: ".$_SESSION['login'];
      ?>

      <hr>
    </div>

    <form class="main-form" action="./index.php" method="post">
    <div class="container">
      <div class="form-group">
        <label for="wlogin">Wybierz użytkownika</label>
        <select class="form-control" id="wlogin" name='wlogin'>
          <?php
          require_once "../../danebazy.php";
          mysqli_report(MYSQLI_REPORT_STRICT);

          try {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0)                                       //wykryto błąd
            {
              throw new Exception(mysqli_connect_errno());
            }else {
              $rezultat=$polaczenie->query("SELECT * FROM konta");
              if(!$rezultat) throw new Exception($polaczenie->error);
              $ilosc_wynikow=$rezultat->num_rows;
              if ($ilosc_wynikow==0) {
                $wynik="Brak wyników";
              }else {
              while ($fetch=$rezultat->fetch_row()) {
                echo "<option value='".$fetch[0]."'>".$fetch[1]."</option>";
              }
            }
            }
            $polaczenie->close();
          } catch (Exception $e) {
            echo 'Błąd serwera, zapraszamy w innym terminie';
          }

         ?>

      </select><br>
      </div>
      <div class="form-group">
      <label for="wuprawnienia">Wybierz nowe uprawnienia</label>
      <select class="form-control" id="wuprawnienia" name="wuprawnienia">
           <?php
           require_once "../../danebazy.php";
           mysqli_report(MYSQLI_REPORT_STRICT);

           try {
             $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
             if ($polaczenie->connect_errno!=0)                                       //wykryto błąd
               {
                 throw new Exception(mysqli_connect_errno());
               }else {
           $rezultat2=$polaczenie->query("SELECT * FROM uprawnienia");
           if(!$rezultat2) throw new Exception($polaczenie->error);
           $ilosc_wynikow2=$rezultat2->num_rows;
           if ($ilosc_wynikow2==0) {
             $wynik2="Brak wyników";
           }else {
           while ($fetch2=$rezultat2->fetch_row()) {
             echo "<option value='".$fetch2[0]."'>".$fetch2[1]."</option>";
           }
         }
       }
      } catch (Exception $e) {
        echo 'Błąd serwera, zapraszamy w innym terminie';
      }
            ?>

      </select><br>
      </div>
      <button type="submit" class="form-control col-2 text-uppercase">Zatwierdź</button>
    </div>
  </form>
    <div class="container my-5">
      <?php
      if ($_SESSION['upraw']<3)
      {
        header('Location: ../..');
        exit();
      }
      if (isset($_POST['wlogin'])) {
        $wlogin=$_POST['wlogin'];
      }
      if (isset($_POST['wuprawnienia'])) {
        $wuprawnienia=$_POST['wuprawnienia'];
        if ($wuprawnienia>2 && $_SESSION['upraw']<4) {
          $_SESSION['e_braku']='Tylko root może dać uprawnienia administratora';
          header('Location: ./index.php');
          exit();
        }

      }
      if($_SESSION['upraw']<4){

      if (isset($wlogin)&&isset($wuprawnienia)&&$_SESSION['upraw']<4) {
        require_once "../../danebazy.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try {
          $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
          if ($polaczenie->connect_errno!=0)                                       //wykryto błąd
          {
            throw new Exception(mysqli_connect_errno());
          }else {
            $rezultat3=$polaczenie->query("UPDATE konta SET id_uprawnien = $wuprawnienia WHERE id=$wlogin AND id_uprawnien!=3 AND id_uprawnien!=4");
            if(!$rezultat3) throw new Exception($polaczenie->error);
            if (isset($rezultat3)) {
              $rezultat4=$polaczenie->query("SELECT id_uprawnien FROM konta WHERE id=$wlogin ");
                if(!$rezultat4) throw new Exception($polaczenie->error);
                $fetch3=$rezultat4->fetch_assoc();
                if ($fetch3['id_uprawnien']>2) {
                  echo "Tylko root może zmieniać uprawnienia administratora";
                }else{
                  $rezultat5=$polaczenie->query("SELECT login FROM konta WHERE id=$wlogin");
                  $rezultat6=$polaczenie->query("SELECT nazwa_uprawnien FROM uprawnienia WHERE id_uprawnien=$wuprawnienia");
                  $fetch4=$rezultat5->fetch_assoc();
                  $fetch5=$rezultat6->fetch_assoc();
                  echo "Uprawnienia konta o loginie: ".$fetch4['login']." zostały zmienione na: ".$fetch5['nazwa_uprawnien'];
                }
                }
              }


          $polaczenie->close();
        }
         catch (Exception $e) {
          echo 'Błąd serwera, zapraszamy w innym terminie';
        }
      }
      }elseif(isset($wlogin)&&isset($wuprawnienia)) {
        require_once "../../danebazy.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try {
          $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
          if ($polaczenie->connect_errno!=0)                                       //wykryto błąd
          {
            throw new Exception(mysqli_connect_errno());
          }else {
            $rezultat3=$polaczenie->query("UPDATE konta SET id_uprawnien = $wuprawnienia WHERE id=$wlogin");
            if(!$rezultat3) throw new Exception($polaczenie->error);
            if (isset($rezultat3)) {
              $rezultat5=$polaczenie->query("SELECT login FROM konta WHERE id=$wlogin");
              $rezultat6=$polaczenie->query("SELECT nazwa_uprawnien FROM uprawnienia WHERE id_uprawnien=$wuprawnienia");
              $fetch4=$rezultat5->fetch_assoc();
              $fetch5=$rezultat6->fetch_assoc();
              echo "Uprawnienia konta o loginie: ".$fetch4['login']." zostały zmienione na: ".$fetch5['nazwa_uprawnien'];
            }

          }
          $polaczenie->close();
        }
         catch (Exception $e) {
          echo 'Błąd serwera, zapraszamy w innym terminie';
      }
      }
       ?>
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
    <script src="../../js/bootstrap.min.js"></script>

  </body>
</html>
