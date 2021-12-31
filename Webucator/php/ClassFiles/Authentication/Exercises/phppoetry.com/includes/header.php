<?php
  // TODO: Start the session
  require_once 'config.php';
  require_once 'utilities.php';
  require_once 'constants.php';
  if ( isDebugMode()) {
    ini_set('display_errors', '1');
  }

  // If $db isn't already set, set it.
  if ( !isset($db)) {
    $db = dbConnect();
  }

  // TODO: Set a variable called $currentUserId, which
  //    will either contain the logged-in user's id or 0 (if no user
  //    is logged in)

  // TODO: If 'user-id' doesn't exist in $_SESSION, check if there
  //    is a token cookie.
  //        If there is one, look for an unexpired match in the
  //        tokens table.
  //            If there is a match, set $_SESSION['user-id'] and
  //            $currentUserId to the user_id associated with that
  //            token.
  //    Don't forget to wrap the code connecting to the database in
  //      a try / catch block.
  
  $pageTitleTag = empty($pageTitle)
              ? 'The Poet Tree Club'
              : $pageTitle . ' | The Poet Tree Club';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:300,400">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Assistant">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" crossorigin="anonymous"
  href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU">
<link rel="stylesheet" href="../../../static/styles/normalize.css">
<link rel="stylesheet" href="../../../static/styles/styles.css">
<script src="../../../static/scripts/scripts.js"></script>
<title><?= $pageTitleTag ?></title>
</head>
<body>
<header>
  <nav id="main-nav">
    <!-- Bar icon for mobile menu -->
    <div id="mobile-menu-icon">
      <i class="fa fa-bars"></i>
    </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="poems.php">Poems</a></li>
      <li><a href="poem-submit.php">Submit Poem</a></li>
      <!-- TODO: If the user is logged in, include this link: -->
        <li><a href="my-account.php">My Account</a></li>
      <!-- OTHERWISE include this link: -->
        <li><a href="login.php">Log in / Register</a></li>
      <li><a href="contact.php">Contact us</a></li>
    </ul>
  </nav>
  <h1>
    <a href="index.php">The Poet Tree Club</a>
  </h1>
  <h2>Set your poems free...</h2>
</header>