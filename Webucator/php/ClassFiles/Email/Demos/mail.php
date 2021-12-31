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
<title>Mail()</title>
</head>
<body>
<main>
<?php
  $to = 'somebody@example.com';
  $headers = array('From' => 'you@youremail.com');
  $subject = 'Test Email';
  $message = 'Test Message';

  if(mail($to,$subject,$message,$headers)) {
    echo "Message Sent (Maybe)";
  } else {
     echo "Message Not Sent";
  }
?>
</main>
</body>
</html>