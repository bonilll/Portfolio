<?php
  ini_set('display_errors', '1');

  unset($_COOKIE['flavor']);
  setcookie('flavor','', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Fully Delete Cookie</title>
</head>
<body>
<main>
  <h1>Fully Delete Cookie</h1>
  <p>Flavor Cookie: <?= $_COOKIE['flavor'] ?></p>
</main>
</body>
</html>