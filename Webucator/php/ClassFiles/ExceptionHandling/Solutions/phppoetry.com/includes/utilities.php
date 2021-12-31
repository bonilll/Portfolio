<?php 
  require_once 'config.php';

  function isProduction() {
    // Provide way of knowing if the code is on production server
    return false;
  }

  function isDebugMode() {
    // You may want to provide other ways for setting debug mode
    return !isProduction();
  }

  function dbConnect() {
    $dbConfig = getDbConfig();
    $dsn = $dbConfig['dsn'];
    $username =  $dbConfig['un'];
    $password =  $dbConfig['pw'];

    try {
      $db = new PDO($dsn, $username, $password);
      return $db;
    } catch (PDOException $e) {
      // log error
      logError($e, true);
      return false;
    }
  }

  function logError($e, $redirect=false) { 
    $errorType = gettype($e);
    switch ($errorType) {
      case 'string':
        $msg = $e;
        break;
      default:
        $msg = $e->getMessage() . ' in ' . $e->getFile() . 
          ' on line ' . $e->getLine();
    }
    error_log($msg); // php_error.log

    if (isDebugMode()) {
      echo "<h3 class='error'>For Developers' Eyes Only</h3>
        <div class='error'>$msg</div>";
    }

    if ($redirect && !isDebugMode()) {
      // Redirect to error page
      header("Location: error-page.php");
    }
  }
?>