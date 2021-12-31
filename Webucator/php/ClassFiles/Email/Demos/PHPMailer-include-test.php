<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>PHPMailer Include Test</title>
</head>
<body>
<main id="include-test">
<h1>PHPMailer Include Test</h1>
<?php
  $file1 = "PHPMailer/PHPMailer.php";
  $file2 = "PHPMailer/SMTP.php";
  $file3 = "PHPMailer/Exception.php";

  if ($path1 = stream_resolve_include_path($file1) ) {
    echo "<h1 class='success'>SUCCESS</h1>
      <p>Found <em>$file1</em> at <em>$path1</em>";
  } else {
    echo "<h1 class='error'>FAIL</h1>
      <p>Could not find <em>$file1</em> in include folders.</p>";
  }

  if ($path2 = stream_resolve_include_path($file2) ) {
    echo "<h1 class='success'>SUCCESS</h1>
      <p>Found <em>$file2</em> at <em>$path2</em>";
  } else {
    echo "<h1 class='error'>FAIL</h1>
      <p>Could not find <em>$file2</em> in include folders.</p>";
  }

  if ($path3 = stream_resolve_include_path($file3) ) {
    echo "<h1 class='success'>SUCCESS</h1>
      <p>Found <em>$file3</em> at <em>$path3</em>";
  } else {
    echo "<h1 class='error'>FAIL</h1>
      <p>Could not find <em>$file3</em> in include folders.</p>";
  }
?>
</main>
</body>
</html>