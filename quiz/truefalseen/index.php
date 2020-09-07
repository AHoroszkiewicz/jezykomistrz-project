<?php
  session_start();
  if (!isset($_SESSION['zalogowany']))
  {
    header('Location: ..');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz </title>
  <link rel="stylesheet" href="style.css">
  </head>
  <body>
<form action="score.php" method="post">
  <li>
  <h3> Is HTML programming language?</h3>
  <div>
  <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
  <label for="question-1-answers-A">A) Yes </label>
  </div>
  <div>

  <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />

  <label for="question-1-answers-B">B) No </label>
  </div>
</li>
<li>
  <h3> What Freeware is? </h3>
  <div>
  <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />

  <label for="question-2-answers-A">A) software without license </label>

  </div>

  <div>

  <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />

  <label for="question-2-answers-B">B) Paid software </label>

  </div>
</li>
<li>
<h3> Virus that shows ads is named: </h3>

  <div>

  <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />

  <label for="question-3-answers-A">A) Adware </label>

  </div>

  <div>

  <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />

  <label for="question-3-answers-B">B) AIDS </label>

  </div>
</li>
<li>

  <h3> What is the purpose of router  </h3>
  <div>

  <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />

  <label for="question-4-answers-A">A) Connecting networks </label>

  </div>

  <div>

  <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />

  <label for="question-4-answers-B">B) defending the network </label>

  </div>
</li>
<li>
<h3> Is Xiaomi Better? </h3>
  <div>

  <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />

  <label for="question-5-answers-A">A) Yes </label>

  </div>

  <div>

  <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />

  <label for="question-5-answers-B">B) No </label>

  </div>
</li>
<li>
<h3> Which version of android is the newest? </h3>
  <div>

  <input type="radio" name="question-6-answers" id="question-6-answers-A" value="A" />

  <label for="question-6-answers-A">A) 9.0 </label>

  </div>

  <div>

  <input type="radio" name="question-6-answers" id="question-6-answers-B" value="B" />

  <label for="question-6-answers-B">B) 10.0 </label>

  </div>


<input type="submit" value="Sprawdz" />



</form>


  </body>
</html>
