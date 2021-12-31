<?php
  require_once 'includes/utilities.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../../static/styles/normalize.css">
<link rel="stylesheet" href="../../../static/styles/styles.css">
<title>Database Connection Test</title>
</head>
<body>
<main>
  <?php
    if ($db = dbConnect()) {
      echo "<h1 class='success'>SUCCESS</h1>
      <p class='success'>Connection created.</p>";
    } else {
      echo "<h1 class='error'>FAIL</h1>
        <p class='error'>Connection not created.</p>";
    }
  ?>
</main>
</body>
</html>