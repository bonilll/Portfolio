<footer>
  <span>Copyright &copy; 2019 The Poet Tree Club.</span>
  <nav>
  <?php
    if ( $currentUserId ) {
      echo '<a href="' . $pathStart . 'logout.php">Log out</a>';
    }
    if ( isAdmin($currentUserId) ) {
      echo '<a href="' . $pathStart . 'admin/index.php">Admin</a>';
    }
  ?>
  <a href="<?= $pathStart ?>about-us.php">About us</a>
  </nav>
</footer>
</body>
</html>