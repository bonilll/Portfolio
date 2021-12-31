<?php
ini_set('display_errors', '1');
$pageTitle = 'Contact Us';
require 'includes/header.php';

$f = [];

// Trim and Assign Form Entries
$f['first-name'] = trim($_POST['first-name'] ?? '');
$f['last-name'] = trim($_POST['last-name'] ?? '');
$f['email'] = trim($_POST['email'] ?? '');
$f['message'] = trim($_POST['message'] ?? '');
$f['placeholder'] = 'Be it poetry. Be it prose.
This is where your message goes.';

echo '<main id="contact-form">';
echo "<h1>$pageTitle</h1>";

// You will do your work here.
  ?>
  <form method="post" action="contact.php" novalidate>
    <label for="first-name">First Name*:</label>
    <input name="first-name" id="first-name"
      value="<?= $f['first-name'] ?>" required>
    <label for="last-name">Last Name*:</label>
    <input name="last-name" id="last-name"
      value="<?= $f['last-name'] ?>" required>
    <label for="email">Email*:</label>
    <input type="email" name="email" id="email"
      value="<?= $f['email'] ?>" required>
    <label for="message">Message*:</label>
    <textarea placeholder="<?= $f['placeholder'] ?>" id="message"
      name="message"><?= $f['message'] ?></textarea>
    <button name="send" class="wide">Send</button>
  </form>
</main>
<?php
  require 'includes/footer.php';
?>