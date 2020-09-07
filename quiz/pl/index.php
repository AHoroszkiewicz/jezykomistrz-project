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
    <title>Quiz </title>
    <link rel="stylesheet" href="./style/main1.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="shortcut icon" href="./img/icon.png">

  </head>
  <body>
    <?php
if (isset($_POST['question-1-answers'])&&isset($_POST['question-2-answers'])&&
isset($_POST['question-3-answers'])&&isset($_POST['question-4-answers'])&&
isset($_POST['question-5-answers'])&&isset($_POST['question-6-answers'])) {
  // code...
    require_once '../../danebazy.php';
    if (isset($_POST['question-1-answers'])) {
      $answer1 = $_POST['question-1-answers'];
      }
      else {
        $answer1 = "brak";
      }
    if (isset($_POST['question-2-answers'])) {
      $answer2 = $_POST['question-2-answers'];
      }
      else {
        $answer2 = "brak";
      }
    if (isset($_POST['question-3-answers'])) {
      $answer3 = $_POST['question-3-answers'];
      }
      else {
        $answer3 = "brak";
      }
    if (isset($_POST['question-4-answers'])) {
      $answer4 = $_POST['question-4-answers'];
      }
      else {
        $answer4 = "brak";
      }
    if (isset($_POST['question-5-answers'])) {
      $answer5 = $_POST['question-5-answers'];
      }
      else {
        $answer5 = "brak";
      }
    if (isset($_POST['question-6-answers'])) {
      $answer6 = $_POST['question-6-answers'];
      }
      else {
        $answer6 = "brak";
      }
    $totalCorrect = 0;
    echo "
    1.Czy HTML jest językiem programowania? <br>
    Twoja odpowiedź: $answer1 <br>
    Poprawna odpowiedź: B<br>";
    echo "2.Darmowe oprogramowanie to: <br>
    Twoja odpowiedź: $answer2 <br>
    Poprawna odpowiedź: A<br>";
    echo "3.Wirusem wyświetlającym reklamy jest <br>
    Twoja odpowiedź: $answer3 <br>
    Poprawna odpowiedź: B<br>";
    echo "4.Trasownik to po Angielsku: <br>
    Twoja odpowiedź: $answer4 <br>
    Poprawna odpowiedź: A<br>";
    echo "5. Czy Xiaomi lepsze? <br>
    Twoja odpowiedź: $answer5 <br>
    Poprawna odpowiedź: A<br>";
    echo "Ruchomy obrazek to: <br>
    Twoja odpowiedź: $answer6 <br>
    Poprawna odpowiedź: B<br>";
    if ($answer1 == "B") { $totalCorrect++; };
    if ($answer2 == "A") { $totalCorrect++; };
    if ($answer3 == "B") { $totalCorrect++; };
    if ($answer4 == "A") { $totalCorrect++; };
    if ($answer5 == "A") { $totalCorrect++; };
    if ($answer6 == "B") { $totalCorrect++; };
    echo "<div id='results'>$totalCorrect / 6 Poprawne</div>";
    echo '<h3>Kliknij <a href="../../">tutaj</a> aby wrócić do strony głównej</h3>';
    try {
      $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
      if($polaczenie->connect_errno!=0){
        throw new Exception(mysqli_connect_errno());
      }else {
              $id=$_SESSION['id_user'];
              $x=$polaczenie->query("UPDATE konta SET quiz_pl_inf=1 WHERE id=$id AND quiz_pl_inf!=1");
        }
      } catch (\Exception $e) {
        echo 'Błąd serwera, zapraszamy w innym terminie';
      }

    }else {

    ?>

<form action="" method="post">
  <li>
  <h3> Czy HTML jest językiem programowania?</h3>
  <div>
  <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
  <label for="question-1-answers-A">A) Tak </label>
  </div>
  <div>

  <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />

  <label for="question-1-answers-B">B) Nie </label>
  </div>
</li>
<li>
  <h3> Darmowe oprogramowanie to </h3>
  <div>
  <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />

  <label for="question-2-answers-A">A) Freeware </label>

  </div>

  <div>

  <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />

  <label for="question-2-answers-B">B) Shareware </label>

  </div>
</li>
<li>
<h3> Wirusem wyświetlającym reklamy jest </h3>

  <div>

  <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />

  <label for="question-3-answers-A">A) Adware </label>

  </div>

  <div>

  <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />

  <label for="question-3-answers-B">B) Watykańczyk </label>

  </div>
</li>
<li>

  <h3> Trasownik to po Angielsku   </h3>
  <div>

  <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />

  <label for="question-4-answers-A">A) Router </label>

  </div>

  <div>

  <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />

  <label for="question-4-answers-B">B) Switch </label>

  </div>
</li>
<li>
<h3> Czy Xiaomi lepsze </h3>
  <div>

  <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />

  <label for="question-5-answers-A">A) Tak </label>

  </div>

  <div>

  <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />

  <label for="question-5-answers-B">B) Nie </label>

  </div>
</li>
<li>
<h3> ruchomy obrazek to </h3>
  <div>

  <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />

  <label for="question-6-answers-A">A) gif (gif) </label>

  </div>

  <div>

  <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />

  <label for="question-6-answers-B">B) gif (dżif)</label>

  </div>


<input type="submit" value="Sprawdz" />



</form>
<h3>Kliknij <a href="../../">tutaj</a> aby wrócić do strony głównej</h3>

<?php
}
?>
  <script src="https://kit.fontawesome.com/1693fe6534.js" crossorigin="anonymous"></script>
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
