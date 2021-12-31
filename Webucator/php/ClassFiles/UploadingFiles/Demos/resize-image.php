<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Resize Image</title>
</head>
<body>
<main>
<h1>Resize Image</h1>
<img src="images/pooh.jpg" alt="Winnie the Pooh">
<img src="images/bulb.png" alt="Light Bulb">
<form method="post" action="resize-image.php">
  <label for="width" class="inline">Width:</label>
  <input type="number" min="50" max="500" step="25"
    id="width" name="width" value="200">
  <label for="height" class="inline">Height:</label>
  <input type="number" min="50" max="500" step="25"
    id="height" name="height" value="300">
  <button name="resizing" value="1">Resize</button>
</form>
<?php
  if (isset($_POST['resizing'])) {
    $w = $_POST['width'];
    $h = $_POST['height'];
    echo '<h1>Resized Images</h1>';
    $poohOrigPath = 'images/pooh.jpg';
    $poohNewPath = "images/pooh-$w-$h.jpg";
    $bulbOrigPath = 'images/bulb.png';
    $bulbNewPath = "images/bulb-$w-$h.png";

    if ($img = imagecreatefromjpeg($poohOrigPath)) {
      $newImg = imagescale($img, $w, $h);
      imagejpeg($newImg, $poohNewPath);
      imagedestroy($img);
      echo "<img src='$poohNewPath' alt='Winnie Resized'>";
    } else {
      echo 'imagecreatefromjpeg() failed: ' . $poohNewPath;
    }

    if ($img = imagecreatefrompng($bulbOrigPath)) {
      $newImg = imagescale($img, $w, $h);
      imagesavealpha($newImg, true);
      imagepng($newImg, $bulbNewPath);
      imagedestroy($img);
      echo "<img src='$bulbNewPath' alt='Bulb Resized'>";
    } else {
      echo 'imagecreatefrompng() failed: ' . $bulbNewPath;
    }
  }
?>
</main>
</body>
</html>