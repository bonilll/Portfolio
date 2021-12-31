<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>File Upload</title>
</head>
<body>
<main>
<?php
  if (empty($_POST['submitted'])) {
?>
<h1>Upload Form</h1>
<form method="post" action="file-upload.php"
      enctype="multipart/form-data">
  <label for="image-name">Image Name:</label>
  <input name="image-name" id="image-name">
  <label for="image">Image:</label>
  <input type="file" name="image" id="image" accept=".png,.jpg">
  <button name="submitted" value="1" class="wide">Submit</button>
</form>
<?php
} else {
  //process the  form
  $errors = [];
  if (!$_POST['image-name']) {
    $error = 'Image name is required.';
  } else {
    $imgFileName = $_FILES['image']['name'];
    $imgTmpLocation = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];

    $ext = strtolower(end(explode('.', $imgFileName)));
    $time = time();
    $imgNewName=$_POST['image-name'] . '_' . $time . '.' . $ext;
    $fileSavePath = 'uploaded-images/' . $imgNewName;
  
    $allowedTypes = ['image/png','image/jpeg'];
    $mimeType = mime_content_type($imgTmpLocation);

    if (!in_array($mimeType, $allowedTypes)) {
      $error = 'You uploaded a file of type ' . $mimeType .
        ' Only png and jpg files are allowed.';
    } elseif ($fileError === UPLOAD_ERR_INI_SIZE) {
      $error = "The file is too big.";
    } elseif ($fileError) {
      $error = "The file could not be uploaded.";
    } elseif (!move_uploaded_file($imgTmpLocation, $fileSavePath)) {
      $error = "Could not save file.";
    }
  }

  if ($error) {
    echo "<h2>Error</h2>
      <p>$error</p>";
  } else {
    echo "<h2>Success</h2>
      <p>Your image has been uploaded.</p>";
  }
}
?>
</main>
</body>
</html>