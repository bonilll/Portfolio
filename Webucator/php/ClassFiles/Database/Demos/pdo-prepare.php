<?php
  $dsn = 'mysql:host=localhost;dbname=poetree';
  $username = 'root';
  $password = 'pwdpwd';
  $db = new PDO($dsn, $username, $password);
  $title = $_GET['title'];
  $query = "SELECT title, poem
    FROM poems
    WHERE title = ?";
  $stmt = $db->prepare($query);
  $stmt->execute([$title]);
  $row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title><?= $row['title'] ?></title>
</head>
<body>
<main>
<?php if ($row) { ?>
  <h1><?= $row['title'] ?></h1>
  <div><?= nl2br($row['poem']) ?></div>
<?php } else { ?>
  <h1>No Results</h1>
  <p>Sorry, we couldn't find a poem by that name.</p>
<?php } ?>
</main>
</body>
</html>