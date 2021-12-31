<?php
  require 'mail-config.php';

  $pageTitle = 'Register';
  require 'includes/header.php';
  logout(); // In case a different user has logged in

  $f = [];

  $f['first-name'] = trim($_POST['first-name'] ?? '');
  $f['last-name'] = trim($_POST['last-name'] ?? '');
  $f['email'] = trim($_POST['email'] ?? '');
  $f['username'] = trim($_POST['username'] ?? '');

  echo "<main class='narrow'>
        <h1>$pageTitle</h1>";

  if (!empty($_POST['register'])) {
    $errors = [];

    // Validate Form Entries
    if (!$f['first-name']) {
      $errors[] = 'You must enter a first name.';
    }

    if (!$f['last-name']) {
      $errors[] = 'You must enter a last name.';
    }

    if (!$f['username'] || strlen($f['username']) < 8) {
      $errors[] = 'Your username must be at least 8 characters.';
    }

    if (!$f['email']) {
      $errors[] = 'Email is required.';
    } elseif (!filter_var($f['email'], FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is not valid.';
    }

    $passPhrase1 = $_POST['pass-phrase-1'];
    $passPhrase2 = $_POST['pass-phrase-2'];
    if (strlen($passPhrase1) < 20) {
      $errors[] = 'Your pass phrase must be at least 20 characters.';
    } elseif ($passPhrase1 !== $passPhrase2) {
      $errors[] = 'Your pass phrases don\'t match.';
    }

    // Check if username exists
    $qUsernameCheck = "SELECT user_id
      FROM users
      WHERE username = ?";

    try {
      $stmtUsername = $db->prepare($qUsernameCheck);
      $stmtUsername->execute([ $f['username'] ]);

      if ($stmtUsername->fetch()) {
        $errors[] = 'That username is already taken.<br>
          Please try a different one.';
      }
    } catch (PDOException $e) {
      logError($e);
      $errors[] = 'Oops! Our bad. We cannot register you right now.';
    }

    // TODO: Check if email exists

    if (!$errors) {
      // TODO: Prepare to insert user by creating the $hashedPhrase,
      //       $token, and $qInserts variables
        
      try {
        // TODO: Insert the user
      } catch (PDOException $e) {
        logError($e);
        $errors[] = 'Registration failed. Please try again.';
      }

      if (!$errors) { // If there are still no errors
        // Send confirmation email
        $qs = http_build_query(['token' => $token]);
        $pathToConfirm = getFullPath('registration-confirm.php');
        $href = $pathToConfirm . '?' . $qs;

        $to = $f['email'];
        $toName = $f['first-name'] . ' ' . $f['last-name'];
        $subject = 'Confirm Registration';

        $html = "<p>Someone registered you for phppoetry.com. If it
          wasn't you, you can ignore this email. If it was,
        <a href='$href'>click here</a> to confirm.</p>";

        $text = "Someone registered you for phppoetry.com. If it
          wasn't you, you can ignore this email. If it was,
          visit $href to confirm.";

        try {
          // Pass true to createMailer() to enable debugMode
          $mail = createMailer();
          $mail->addAddress($to, $toName);
          $mail->Subject = $subject;
          $mail->Body = $html;
          $mail->AltBody = $text;
      
          $mail->send();
        } catch (Exception $e) {
          echo '<p class="error">We are sorry.
            We could not register you at this time.</p>';
          logError($e);
        }

        if (!$registrationMailSent = $mail->send()) {
          echo '<p class="error">We are sorry.
          We could not register you at this time.</p>';
          logError("Mailer Error: " . $mail->ErrorInfo);
        }
      }
    }
  }
  if (!empty($registrationMailSent)) {
    echo '<p class="success">We have sent you an email with
    instructions. Check your email.</p>';
  } else {
?>
  <p>Already have an account? <a href="login.php">Login</a></p>
  <?php
    if (!empty($errors)) {
      echo '<h3>Please correct the following errors:</h3>
      <ol class="error">';
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo '</ol>';
    }
  ?>
  <!-- novalidate set so that PHP validation can be tested -->
  <form method="post" action="register.php" novalidate>
    <label for="first-name">First Name:</label>
    <input name="first-name" id="first-name"
      value="<?= $f['first-name'] ?>" required> 
    <label for="last-name">Last Name:</label>
    <input name="last-name" id="last-name"
      value="<?= $f['last-name'] ?>" required> 
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"
      value="<?= $f['email'] ?>" required> 
    <label for="username">Username:</label>
    <input name="username" id="username"
      value="<?= $f['username'] ?>" required minlength="8"> 
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
    <button name="register" value="1">Register</button>
  </form>
<?php
  }
  echo '</main>';
  require 'includes/footer.php';
?>