<?php
  ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Request Variables</title>
</head>
<body>
<main id="request-variables">
  <h4>REQUEST</h4>
  <?= $_REQUEST['greeting'] ?>
  <h4>GET</h4>
  <?= $_GET['greeting'] ?>
  <h4>POST</h4>
  <?= $_POST['greeting'] ?>
  <h3>Set Variables</h3>
  <div>
    <a href="request.php?greeting=Hello,+get!">Hello, get!</a>
  </div>
  <div>
    <form method="post" action="request.php">
      <button name="greeting" value="Hello, post!">
        Hello, post!
      </button>
    </form>
  </div>
</main>
</body>
</html>