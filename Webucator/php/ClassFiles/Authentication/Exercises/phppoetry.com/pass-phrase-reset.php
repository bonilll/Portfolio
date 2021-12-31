<?php
  require 'mail-config.php';

  $pageTitle = 'Pass Phrase Reset';
  require 'includes/header.php';
  logout();

  $errors = [];

  $email = trim($_POST['email'] ?? '');
?>
<main id="pass-phrase-reset" class="narrow">
<?php
if (isset($_POST['submit'])) { 
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'You must enter a valid email.';
  } else {
    $selUser = "SELECT first_name, last_name, user_id 
                FROM users WHERE email = ?";

    try {
      $stmt = $db->prepare($selUser);
      $stmt->execute([$email]);
      $row = $stmt->fetch(); 
    } catch (PDOException $e) {
      logError($e);
      $errors[] = nl2br(POEM_GENERIC_ERROR);
    }

    if (!empty($row)) {
      $userId = $row['user_id'];
      $firstName = $row['first_name'];
      $lastName = $row['last_name'];

      $token = generateToken(); 

      $qInsert = "INSERT INTO tokens
        (token, user_id, token_expires)
        VALUES ('$token', ?, DATE_ADD(now(), INTERVAL 1 HOUR))";

      try {
        $stmtInsert = $db->prepare($qInsert);

        if ($stmtInsert->execute( [$userId] )) {
          $qs = http_build_query(['token' => $token]);
          $confPath = getFullPath('pass-phrase-reset-confirm.php');
          $href = $confPath . '?' . $qs;

          $to = $email;
          $toName = $firstName . ' ' . $lastName;
          $subject = 'Pass phrase reset';

          $html = "<p>A reset-pass-phrase request has been made
          for your account for phppoetry.com. If you didn't make the
          request, you can ignore this email. If you did, reset your
          pass phrase by <a href='$href'>clicking here</a>.</p>";

          $text = "A reset-pass-phrase request has been made
          for your account for phppoetry.com. If you didn't make the
          request, you can ignore this email. If you did, visit $href
          to reset your pass phrase.";

          $mail = createMailer();
          $mail->addAddress($to, $toName);
          $mail->Subject = $subject;
          $mail->Body = $html;
          $mail->AltBody = $text;

          if (!$mail->send()) {
            echo '<p class="error">
              We could not send you a pass-phrase-reset email.</p>';
            echo "Mailer Error: " . $mail->ErrorInfo;
          } else {
            echo '<p class="success">We have sent you an email with
            instructions. Check your email.</p>';
          }
        } else {
          logError($stmtInsert->errorinfo()[2], true);
        }
      } catch (PDOException $e) {
        logError($e);
        $errors[] = nl2br(POEM_GENERIC_ERROR);
      }
    } else {
      $errors[] = "Sorry. We don't recognize that email.";
    }
  }
}

if (!isset($_POST['submit']) || $errors) {

  if ($errors) {
    echo '<h3>Uh oh!</h3>';
    foreach ($errors as $error) {
      echo "<p class='error'>$error</p>";
    }
  }

  echo "<p>Use the form below to reset your pass phrase:</p>
  <form method='post' novalidate>
    <label for='email'>Email:</label>
    <input type='email' name='email' id='email'
      value='$email' required> 
    <button name='submit' value='1' class='wide'>
      Reset Pass Phrase</button>
  </form>";
}
?>
</main>
<?php
  require 'includes/footer.php';
?>