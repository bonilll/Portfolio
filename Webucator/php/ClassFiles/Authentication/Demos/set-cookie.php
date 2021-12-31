<?php
  ini_set('display_errors', '1');

  setcookie('flavor','chocolate chip', time()+60*60*24*7);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Cookie</title>
</head>
<body>
<main>
  <h1>Cookie</h1>
  <p>Flavor Cookie: <?= $_COOKIE['flavor'] ?></p>
  <a href="unset-cookie.php">Unset Cookie</a>
</main>
</body>
</html>