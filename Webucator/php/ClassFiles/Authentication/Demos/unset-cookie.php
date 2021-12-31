<?php
  ini_set('display_errors', '1');

  unset($_COOKIE['flavor']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Unset Cookie</title>
</head>
<body>
<main>
  <h1>Unset Cookie</h1>
  <p>Flavor Cookie: <?= $_COOKIE['flavor'] ?></p>
  <a href="delete-cookie.php">Delete Cookie</a>
</main>
</body>
</html>