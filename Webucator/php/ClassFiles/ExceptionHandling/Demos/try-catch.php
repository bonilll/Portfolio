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
<title>Try / Catch</title>
</head>
<body>
<main class="pre">
<?php
  $num = 5;
  $den = 0;
  
  try {
    $result = divide($num, $den);
    echo $result;
  } catch (Exception $e) {
    echo '<h3>There was a problem:</h3>';
    $errorMsg = $e->getMessage();
    echo $errorMsg;
    error_log( $errorMsg . ' in ' . $e->getFile() . 
      ' on line ' . $e->getLine() );
    echo '<hr>';
    echo 'Error logged in ' . ini_get('error_log');
  }
?>
</main>
</body>
</html>