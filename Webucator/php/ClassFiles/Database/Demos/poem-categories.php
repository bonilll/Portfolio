<?php
  $dsn = 'mysql:host=localhost;dbname=poetree';
  $username = 'root';
  $password = 'pwdpwd';
  $db = new PDO($dsn, $username, $password);
  $query = "SELECT p.title, c.category
    FROM poems p
    JOIN categories c ON c.category_id = p.category_id";
  $stmt = $db->prepare($query);
  $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Poem Categories</title>
</head>
<body>
<main>
  <h1>Poem Categories</h1>
  <ol>
  <?php
    while ($row = $stmt->fetch()) {
      echo '<li>' . $row['title'] . ' - '
            . $row['category'] . '</li>';
    }
  ?>
  </ol>
</main>
</body>
</html>