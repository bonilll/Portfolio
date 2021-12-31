<?php
  if (!isset($_REQUEST['token'])) {
    header("Location: index.php");
  }

  $pageTitle = 'Reset Password Form';
  require 'includes/header.php';
  logout();

  $showForm = true;
?>
<main class="narrow">
<h1><?= $pageTitle ?></h1>

<?php
  if ($showForm && isset($_POST['token'])) {
    $token = $_POST['token']; 
    $passPhrase1 = $_POST['pass-phrase-1'];
    $passPhrase2 = $_POST['pass-phrase-2'];

    if (strlen($passPhrase1) < 20) {
      $error = 'Your pass phrase must be at least 20 characters.';
    } elseif ($passPhrase1 !== $passPhrase2) {
      $error = 'Your pass phrases don\'t match.';
    } else {
      $showForm = false;

      $hashedPhrase = password_hash($passPhrase1, PASSWORD_DEFAULT);

      $qUpdate = "UPDATE users
        SET pass_phrase = '$hashedPhrase',
          registration_confirmed = 1
        WHERE user_id = (SELECT user_id
                        FROM tokens
                        WHERE token = ?
                          AND token_expires > now() );";

      try {
        $stmtUpdate = $db->prepare($qUpdate);

        if ($stmtUpdate->execute( [$token] )) {
          echo "<span class='success'>Success. 
            <a href='login.php'>Login</a></span>";
        } else {
          logError($stmtUpdate->errorinfo()[2], true); 
        }
      } catch (PDOException $e) {
        logError($e);
        $error = nl2br(POEM_GENERIC_ERROR) .
          '<p><a href="pass-phrase-reset.php">try again</a></p>';
      }
    }
  } elseif ($showForm) {
    $token = $_GET['token'];

    $qSelect = "SELECT * 
      FROM tokens 
      WHERE token = ? AND token_expires > now()";

    try {
      $stmt = $db->prepare($qSelect);
      $stmt->execute([$token]);
  
      if (!$stmt->fetch()) {
        $error = nl2br(POEM_INVALID_TOKEN_PASS_PHRASE_RESET);
        $showForm = false;
      }
    } catch (PDOException $e) {
      logError($e);
      $error = nl2br(POEM_GENERIC_ERROR) .
        '<p><a href="pass-phrase-reset.php">try again</a></p>';
    }
  }
?>
<?php
  if (isset($error)) {
    echo "<article class='poem error'>$error</article>";
  }

  if ($showForm) {
?>
  <form method="post" action="pass-phrase-reset-confirm.php" novalidate>
    <input type="hidden" name="token" value="<?= $token ?>"> 
    <fieldset>
      <legend>Pass Phrase:</legend>
        <em>A hard-to-guess phrase at least 20 characters long.</em>
        <input type="password" placeholder="Pass Phrase"
          name="pass-phrase-1" id="pass-phrase-1"
          required minlength="20"> 
        <input type="password" placeholder="Repeat Pass Phrase"
          name="pass-phrase-2" id="pass-phrase-2"
          required minlength="20">
    </fieldset>
    <button>Change Pass Phrase</button>
  </form>
<?php
  }
  echo '</main>';
  require 'includes/footer.php';
?>