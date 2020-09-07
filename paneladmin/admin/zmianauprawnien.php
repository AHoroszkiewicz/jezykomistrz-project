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
if (isset($_POST['wlogin'])) {
  $wlogin=$_POST['wlogin'];
}
if (isset($_POST['wuprawnienia'])) {
  $wuprawnienia=$_POST['wuprawnienia'];
  if ($wuprawnienia>2 && $_SESSION['upraw']<4) {
    $_SESSION['e_braku']='Tylko root może dać uprawnienia administratora';
    header('Location: ./zmianauprawnien.php');
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
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<form class="" action="./zmianauprawnien.php" method="post">
  <label for="wlogin">Wybierz użytkownika</label>
  <select name='wlogin'>
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
<label for="wuprawnienia">Wybierz nowe uprawnienia</label>
<select name="wuprawnienia">
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
<input type="submit" name="" value="Potwierdź">
</form>

<?php
if (isset($wynik)) {
  echo '<div>'.$wynik.'</div>';
}
if (isset($wynik2)) {
  echo '<div>'.$wynik2.'</div>';
}
if (isset($_SESSION['e_braku'])) {
  echo '<div>'.$_SESSION['e_braku'].'</div>';
  unset($_SESSION['e_braku']);
}

 ?>
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
</body>
</html>
