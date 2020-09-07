<!-- strona do logowania i łącznia się z bazą danych -->
<?php

  session_start();

  require_once "./danebazy.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);       //połączenie z bazą
if(!empty($_POST['login'])&& !empty($_POST['password'])){                   //sprawdzenie czy pola są wypełnione

  if ($polaczenie->connect_errno!=0)                                        //wykryto błąd
  {
    echo "Error: ".$polaczenie->connect_errno;                              //wyświetlanie erroru
  }else {                                                                   //wprowadzenie zmiennych z loginem i hasłem
    $login = $_POST['login'];
    $haslo = $_POST['password'];

    $login= htmlentities($login, ENT_QUOTES, "UTF-8");                      //przeciw sqlinjection

    if ($wynik = @$polaczenie->query(
      sprintf("SELECT*FROM konta WHERE login='%s'",          //zapytanie bazy z sqlinjection
      mysqli_real_escape_string($polaczenie,$login))))
          {
        $users= $wynik->num_rows;
        if ($users>0)                                                       //zapytanie czy są jakieś wyniki
            {
              $wiersz= $wynik->fetch_assoc();
              if(password_verify($haslo, $wiersz['haslo'])){

                $_SESSION['zalogowany']=true;
                $_SESSION['id_user']=$wiersz['id'];
                $_SESSION['login']= $wiersz['login'];
                $_SESSION['status']=$wiersz['id_statusu'];
                $_SESSION['upraw']= $wiersz['id_uprawnien'];                                //wprowadzenie zmiennej z uprawnieniami
                if ($_SESSION['status']>1)                                                //jeśli status nieaktywny
                {
                  $_SESSION['e_status']="Użytkownik nieaktywny/zablokowany/usunięty <br>";
                  header('Location: .');
                /*header('Location: ./index.php?errstatus=');*/
                /*echo "Użytkownik nieaktywny/zablokowany/usunięty <br>";
                echo "Kliknij <a href='./index.php'>tutaj</a> aby wrócić do ekranu logowania";*/
              }else {

            if ($_SESSION['upraw']>2)                                                   //jeśli uprawnienia większe niż teacher
              {
              $wynik->close();
              header('Location: ./paneladmin');                         //przenieś na admin panel
              }
              else {
                $wynik->close();
                header('Location: ./user');                            //przenieś na user panel
                    }
                  }
                }else {
                  $wynik->close();
                  $_SESSION['e_login']="Błędny login lub hasło <br>";
                  header('Location: .');
                  /*header('Location: ./index.php?errlogin=');*/
                }
            }else {
              $wynik->close();
              $_SESSION['e_login']="Błędny login lub hasło <br>";
              header('Location: .');
              /*header('Location: ./index.php?errlogin=');*/
              /*echo "Błędne hasło lub użytkownik nie istnieje <br>";
              echo "Kliknij <a href='./indedx.php'>tutaj</a> aby wrócić do ekranu logowania";*/
                }
          }else {
            $wynik->close();
            $_SESSION['e_wut']="Błąd przy łączeniu się z bazą danych <br>";
            header('Location: .');
            /*echo "Nie wiem jak tu trafiłeś <br>";
            echo "Kliknij <a href='./index.php'>tutaj</a> aby wrócić do ekranu logowania";*/
          }
    $polaczenie->close();
        }
      }else {
        $_SESSION['e_null']="Pole login i hasło nie mogą być puste <br>";
        $polaczenie->close();
        header('Location: .');                                    //przenieś na logowanie

      }



?>
