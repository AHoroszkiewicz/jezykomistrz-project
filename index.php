<!-- strona do rejestracji -->
<?php
  session_start();
  if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true)
  &&($_SESSION['upraw']<3) &&($_SESSION['status']==1))
  {
    header('Location: ./user');
    exit();
  }
  if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true)
  &&($_SESSION['upraw']>2))
  {
    header('Location: ./paneladmin');
    exit();
  }
//w razie błędnego uzupełnienia formularza
  if (isset($_POST['email'])) {
    $walidacja_ok=true;
    $login=$_POST['login'];
    $email=$_POST['email'];
    $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
    $haslo=$_POST['password'];
    $haslo2=$_POST['password2'];
    $haslo_hash=password_hash($haslo, PASSWORD_ARGON2ID);
    //$captchakey="captcha secet code";
    //$captchacheck=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captchakey.'&response='.$_POST['g-recaptcha-response']);
    //$answer=json_decode($captchacheck);
//poprawność login
    if (strlen($login)<3 || (strlen($login)>15)) {
      $walidacja_ok=false;
      $_SESSION['e_loginr']="Login musi posiadać od 3 do 15 znaków";
    }

    if (ctype_alnum($login)==false) {
       $walidacja_ok=false;
       $_SESSION['e_loginr']="Login może składać się tylko z liter i cyfr(bez polskich znaków)";
    }
//poprawność email
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)) {
      $walidacja_ok=false;
      $_SESSION['e_email']="Adres e-mail jest nieprawidłowy";
    }
//poprawność hasła
    if ((strlen($haslo)<8) || (strlen($haslo)>20)) {
      $walidacja_ok=false;
      $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
    }
    if ($haslo!=$haslo2) {
      $walidacja_ok=false;
      $_SESSION['e_haslo']="Podane hasła muszą być identyczne";
    }
//checkbox
    if (!isset($_POST['regulamin'])) {
      $walidacja_ok=false;
      $_SESSION['e_regulamin']="Potwierdź akceptację regulaminu";
    }
//recaptcha gdyby była
    //if ($answer->success==false) {
    //  $walidacja_ok=false;
    //  $_SESSION['e_captcha']="Potwierdź, że nie jesteś robotem";
    //}
//połączenie z bazą
    require_once "danebazy.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
      $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
      if ($polaczenie->connect_errno!=0)                                       //wykryto błąd
        {
          throw new Exception(mysqli_connect_errno());                              //wyświetlanie erroru
        }else {
          //sprawdzenie czy mail jest w bazie
          $rezultat=$polaczenie->query("SELECT id FROM konta WHERE email='$email'");

          if(!$rezultat) throw new Exception($polaczenie->error);
          $ilosc_maili=$rezultat->num_rows;
          if ($ilosc_maili>0) {
            $walidacja_ok=false;
            $_SESSION['e_email']="Istnieje już konto z tym adresem e-mail";
          }
          //sprawdzenie czy login jest w bazie
          $rezultat=$polaczenie->query("SELECT id FROM konta WHERE login='$login'");

          if(!$rezultat) throw new Exception($polaczenie->error);
          $ilosc_loginow=$rezultat->num_rows;
          if ($ilosc_loginow>0) {
            $walidacja_ok=false;
            $_SESSION['e_login']="Istnieje już konto z tym loginem";
          }

          if ($walidacja_ok==true) {
            //zapytanie do bazy z rejestracją
            if ($polaczenie->query("INSERT INTO konta VALUES (NULL, '$login', '$haslo_hash', '$email', 1, 1, 0)")) {
              $_SESSION['udanarejestracja']=true;
              header('Location: udanarejestracja');
            }else {
              throw new Exception($polaczenie->error);
            }
          }

          $polaczenie->close();
        }
    } catch (Exception $e) {
      echo 'Błąd serwera, zapraszamy w innym terminie';
    }


  }

 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Językomistrz</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/main1.css">
    <link rel="shortcut icon" href="./img/icon.png">

  </head>
  <body>
  <form action="logowanie.php" method="post">
    <div class="modal fade" role="dialog" id="loginPanel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Zaloguj się</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="login" class="form-control" placeholder="Login">
              </div>
            </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Hasło">
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" value="" id="defaultCheck1">
              <label class="custom-control-label" for="defaultCheck1">
                Zapamiętaj mnie
              </label>
            </div>
          </div>
          <div class="error">
          <?php
          if (isset($_SESSION['e_status'])) {
            echo '<div class="error">'.$_SESSION['e_status'].'</div>';
            unset($_SESSION['e_status']);
          }
            // if (isset($_GET['errstatus'])) {
            //     echo "Użytkownik nieaktywny/zablokowany/usunięty <br>";
            //   }
            if (isset($_SESSION['e_login'])) {
              echo '<div class="error">'.$_SESSION['e_login'].'</div>';
              unset($_SESSION['e_login']);
            }
            // if (isset($_GET['errlogin'])){
            //     echo "Błędny login lub hasło <br>";
            //   }
            if (isset($_SESSION['e_wut'])) {
              echo '<div class="error">'.$_SESSION['e_wut'].'</div>';
              unset($_SESSION['e_wut']);
            }
            // if (isset($_GET['errwut'])){
            //     echo "Nie wiem co się stało ale coś jest nie tak <br>";
            //   }
            if (isset($_SESSION['e_null'])) {
              echo '<div class="error">'.$_SESSION['e_null'].'</div>';
              unset($_SESSION['e_null']);
            }
            // if (isset($_GET['errnull'])){
            //     echo "Pole login i hasło nie mogą być puste<br>";
            //   }
          ?>
          </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="Zaloguj">Zaloguj się</button>
          </div>
        </div>
        </div>
      </div>
  </form>
  <form method="post">
    <div class="modal fade" role="dialog" id="regPanel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Zapisz się</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-at"></i></span>
                </div>
              <input type="text" name="email" class="form-control" placeholder="E-mail">

            </div>
            <?php
                if (isset($_SESSION['e_email'])) {
                  echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                  unset($_SESSION['e_email']);
                }
              ?>
          </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
              <input type="text" name="login" class="form-control" placeholder="Login">
            </div>
            <?php
              if (isset($_SESSION['e_loginr'])) {
                echo '<div class="error">'.$_SESSION['e_loginr'].'</div>';
                unset($_SESSION['e_loginr']);
              }
            ?>
          </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
              <input type="password" name="password" class="form-control" placeholder="Hasło">
            </div>
            <?php
              if (isset($_SESSION['e_haslo'])) {
                echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                unset($_SESSION['e_haslo']);
              }
            ?>
          </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
              <input type="password" name="password2" class="form-control" placeholder="Potwierdź hasło">
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="regulamin" value="" id="defaultCheck2">
              <label class="custom-control-label" for="defaultCheck2"> Akceptuję </label><a style="color: blue;" href="regulamin"> regulamin </a>
            </div>
              <?php
                if (isset($_SESSION['e_regulamin'])) {
                    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                    unset($_SESSION['e_regulamin']);
                  }
              ?>
            </div>
            <div class="text-center">
              <div class="g-recaptcha" data-sitekey="6Lfa_r4UAAAAANdQxi93U47sQ6s_vtzQPPNUkn8O"></div>
            </div>
            <?php //gdyby była captcha
              //if (isset($_SESSION['e_captcha'])) {
              //    echo '<div style="text-align: center" class="error">'.$_SESSION['e_captcha'].'</div>';
              //    unset($_SESSION['e_captcha']);
              //  }
            ?>
          </div>
          <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="rejestracja">Zapisz się</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- MENU -->
      <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
        <a class="navbar-brand" href="index.php"><img src="./img/logo1.svg" height="100" alt=""></a>
          <div class="btn-group ml-auto" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#loginPanel"  aria-expended="false"> Zaloguj się </button>
            <button type="button" class="btn btn-outline-light btn-md" data-toggle="modal" data-target="#regPanel"  aria-expended="false"> Zapisz się </button>
          </div>
      </nav><!--MENU -->
      <div class="jumbotron">
        <div class="container-fluid">
          <div class="row py-3">
            <div class="col m-auto text-center">
              <h1>Nauka Języka obcego - technicznego</h1>
              <p class="container">Dzięki naszej witrynie zapoznasz się ze słownictwem języków obcych technicznych. Oferujemy naukę wybranego przez Ciebie języka z pośród dostępnych kategorii na naszej stronie.</p>
            </div>
          </div>
      </div>
    </div>

    <div id="slides" class="carousel slide" data-ride="carousel">
	       <ul class="carousel-indicators">
		         <li data-target="#slides" data-slide-to="0" class="active"></li>
		         <li data-target="#slides" data-slide-to="1"></li>
		         <li data-target="#slides" data-slide-to="2"></li>
	       </ul>
	       <div class="carousel-inner">
		     <div class="carousel-item active">
			       <img style="width: 100%;" src="./img/background.jpg">
			          <div class="carousel-caption">
				        <h1 class="display-2">Językomistrz</h1>
				        <h3>Nauka języków obcych technicznych</h3>
				        <button type="button" class="btn btn-outline-light btn-lg">Szybki quiz</button>
				        <button type="button" class="btn btn-success btn-lg"  data-toggle="modal" data-target="#regPanel"  aria-expended="false">Dołącz do nas</button>
			          </div>
                <div class="overlay"></div>
		     </div>
		     <div class="carousel-item">
			       <img style="width: 100%;"  src="./img/background.jpg">
             <div class="overlay"></div>
		     </div>
		     <div class="carousel-item">
			        <img style="width: 100%;" src="./img/background.jpg">
              <div class="overlay"></div>
		     </div>
	       </div>
    </div>
    <div class="jumbotron">
      <div class="container-fluid">
        <div class="row m-auto text-center py-3">
          <div class="col m-auto text-center">
          <h3>Oferujemy wybór dwóch języków obcych do nauki</h3>
        </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-3"></div>
          <div class="col-lg-3 my-4">
            <img src="./img/united-kingdom.svg" width="110" alt="">
          </div>
          <div class="col-lg-3 my-4">
            <img src="./img/germany.svg" width="110" alt="">
          </div>
          <div class="col-lg-3"></div>
        </div>
      <hr class="my-5">
        <div class="row m-auto text-center py-3">
          <div class="col m-auto text-center">
            <h3 class="display-5">Dzięki naszej witrynie nauczysz się języka technicznego opartego o następujące zawody</h3>
          </div>
        </div>
          <div class="row text-center mt-4">
            <div class="col-lg-4 my-4">
              <img src="./img/man.svg" width="110" alt="">
              <h5 class="my-3">Prawo</h5>
            </div>
            <div class="col-lg-4 my-4 mx-auto">
              <img src="./img/doctor.svg" width="110" alt="">
              <h5 class="my-3">Medycyna</h5>
            </div>
            <div class="col-lg-4 my-4">
              <img src="./img/diet.svg" width="110" alt="">
              <h5 class="my-3">Dietetyka</h5>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-lg-4 my-4">
              <img src="./img/it.svg" width="110" alt="">
              <h5 class="my-3">Informatyka</h5>
            </div>
            <div class="col-lg-4 my-4">
              <img src="./img/media.svg" width="110" alt="">
              <h5 class="my-3">Media</h5>
            </div>
            <div class="col-lg-4 my-4">
              <img src="./img/mark.svg" width="110" alt="">
              <h5 class="my-3">Marketing</h5>
            </div>
          </div>
        </div>
        <div class="row  m-auto text-center py-3">

        </div>
    </div>
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

    <script src="https://kit.fontawesome.com/1693fe6534.js" crossorigin="anonymous"></script>
    <!--<script src='https://www.google.com/recaptcha/api.js' async defer></script>                     gdyby była captcha--> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
