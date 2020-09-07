<?php
  session_start();
  if (!isset($_SESSION['zalogowany']))
  {
    header('Location: ..');
    exit();
  }
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
  $answer6s = $_POST['question-6-answers'];
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
?>
