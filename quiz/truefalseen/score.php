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
    $answer1 = "none";
  }
if (isset($_POST['question-2-answers'])) {
  $answer2 = $_POST['question-2-answers'];
  }
  else {
    $answer2 = "none";
  }
if (isset($_POST['question-3-answers'])) {
  $answer3 = $_POST['question-3-answers'];
  }
  else {
    $answer3 = "none";
  }
if (isset($_POST['question-4-answers'])) {
  $answer4 = $_POST['question-4-answers'];
  }
  else {
    $answer4 = "none";
  }
if (isset($_POST['question-5-answers'])) {
  $answer5 = $_POST['question-5-answers'];
  }
  else {
    $answer5 = "none";
  }
if (isset($_POST['question-6-answers'])) {
  $answer6s = $_POST['question-6-answers'];
  }
  else {
    $answer6 = "none";
  }
$totalCorrect = 0;
echo "
1.Is HTML a programming language? <br>
Your answer: $answer1 <br>
Correct answer: B<br>";
echo "2.What freeware is: <br>
Your answer: $answer2 <br>
Correct answer: A<br>";
echo "3.Virus that shows ads is named: <br>
Your answer: $answer3 <br>
Correct answer: B<br>";
echo "4.What is the purpose of router: <br>
Your answer: $answer4 <br>
Correct answer: A<br>";
echo "5. Is Xiaomi Better? <br>
Your answer: $answer5 <br>
Correct answer: A<br>";
echo "Which version of android is the newest?: <br>
Your answer: $answer6 <br>
Correct answer: B<br>";
if ($answer1 == "B") { $totalCorrect++; };
if ($answer2 == "A") { $totalCorrect++; };
if ($answer3 == "B") { $totalCorrect++; };
if ($answer4 == "A") { $totalCorrect++; };
if ($answer5 == "A") { $totalCorrect++; };
if ($answer6 == "B") { $totalCorrect++; };
echo "<div id='results'>$totalCorrect / 6 Poprawne</div>";
?>
