<?php
  ini_set('display_errors', '1');
  function divide($numerator, $denominator) {
    $numerator = (int) $numerator;
    $denominator = (int) $denominator;
    if ($denominator === 0) {
      throw new Exception('YOU CANNOT DIVIDE BY ZERO!');
    }
    return $numerator / $denominator;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Division</title>
</head>
<body>
<main>
  <?php
    $num = $_GET['num'] ?? '';
    $den = $_GET['den'] ?? '';
    if (is_numeric($num) && is_numeric($den)) {
      // Your code here
    }
  ?>
  <form method="get" action="division.php">
    <label for="den">Numerator:</label>
    <input id="num" name="num" type="number" value="<?= $num ?>">
    <label for="den">Denominator:</label>
    <input id="den" name="den" type="number" value="<?= $den ?>">
    <button>DIVIDE</button>
  </form>
</main>
</body>
</html>