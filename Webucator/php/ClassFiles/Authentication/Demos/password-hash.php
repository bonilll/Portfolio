<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>password_hash()</title>
</head>
<body>
<main>
  <h1>password_hash()</h1>
  <?php
    $passPhrase = $_POST['pass-phrase'] ?? '';
    if ($passPhrase) {
      $hashedPhrase = password_hash($passPhrase, PASSWORD_DEFAULT);
      
      echo "<p>The entered pass phrase is:<br>
            <code>$passPhrase</code></p>";
      echo "<p>The hashed pass phrase is:<br>
            <code>$hashedPhrase</code></p>";
    }
  ?>
  <form method="post">
    <label for="pass-phrase">Pass phrase:</label>
    <input name="pass-phrase" id="pass-phrase"
      value="<?= $passPhrase ?>">
    <button class="wide">Submit</button>
  </form>
</main>
</body>
</html>