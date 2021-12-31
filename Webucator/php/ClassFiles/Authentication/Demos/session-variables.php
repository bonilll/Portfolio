<?php
  ini_set('display_errors', '1');

  session_start();
  $_SESSION['greeting'] = 'Hello';
  $_SESSION['name'] = 'world';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Session Variables</title>
</head>
<body>
<main>
  <h3>Session Variables</h3>
  <p>Two session variables created:</p>
  <ol>
    <li><?= $_SESSION['greeting'] ?></li>
    <li><?= $_SESSION['name'] ?></li>
  </ol>
  <p>Unset greeting session variable.</p>
  <?php
    unset($_SESSION['greeting']);
  ?>
  <ol>
    <li><?= $_SESSION['greeting'] ?></li>
    <li><?= $_SESSION['name'] ?></li>
  </ol>
</main>
</body>
</html>