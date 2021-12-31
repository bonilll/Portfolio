<?php
  $pageTitle = 'Admin: Edit User';
  $pathStart = '../';
  require '../includes/header.php';

  if ( !isAdmin($currentUserId) ) {
    // How did you get here?
    header("Location: ../index.php");
  }
?>
<main id="user" class="admin">
  <h1><?= $pageTitle ?></h1>
  <?php require 'includes/nav.php'; ?>
  
</main>
<?php
  require '../includes/footer.php';
?>