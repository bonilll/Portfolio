<?php
  require_once '../Solutions/phppoetry.com/includes/utilities.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Query Failure</title>
</head>
<body>
<main>
<?php
  $db = dbConnect();
  try {
    // users table doesn't have user_name field
    $query = 'SELECT user_name FROM users';
    $stmt = $db->prepare($query);
    if (!$stmt->execute()) {
      // The query failed
      $errorMsg = $stmt->errorInfo()[2] . ": $query";
      logError($errorMsg, true);
    }
  } catch (PDOException $e) {
    // Some error occurred with our database communication
    logError($e, true);
  }

  // If we get here without an error,
  //   we can safely fetch data from $stmt
?>
</main>
</body>
</html>