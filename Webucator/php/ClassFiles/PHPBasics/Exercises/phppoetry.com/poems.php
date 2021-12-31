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
<title>Poems | The Poet Tree Club</title>
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
      <li><a href="my-account.php">My Account</a></li>
      <li><a href="contact.php">Contact us</a></li>
    </ul>
  </nav>
  <h1><a href="index.php">The Poet Tree Club</a></h1>
  <h2>Set your poems free...</h2>
</header>
<main id="poems">
  <h1>Poems</h1>
  <table>
    <caption>Total Poems: 8</caption>
    <thead>
      <tr>
        <th>Poem</th>
        <th>Category</th>
        <th>Author</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
      <tr class="normal">
        <td>Carrots and Camels</td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
      <tr class="normal">
        <td><a href="poem.php">Dancing Dogs in Dungarees</a></td>
        <td>Funny</td>
        <td>LimerickMan</td>
        <td>01/11/2019</td>
      </tr>
    </tbody>
    <tfoot class="pagination">
      <tr>
        <td>Previous</td>
        <td colspan="2"></td>
        <td>Next</td>
      </tr>
    </tfoot>
  </table>
  <h2>Filtering</h2>
  <form method="get" action="poems.php">
    <label for="cat">Category:</label>
    <select name="cat" id="cat">
      <option value="0">All</option>
      <option value='7' disabled>Celebratory (0)</option>
      <option value='2'>Funny (5)</option>
      <option value='5' disabled>Nature (0)</option>
      <option value='8' disabled>Other (0)</option>
      <option value='6' disabled>Religious (0)</option>
      <option value='1'>Romantic (2)</option>
      <option value='3' disabled>Scary (0)</option>
      <option value='4'>Serious (1)</option>
    </select>
    <label for="user">Author:</label>
    <select name="user" id="user">
      <option value="0">All</option>
      <option value='3'>Dawnable (1)</option>
      <option value='2'>HugHerHeart (2)</option>
      <option value='1'>LimerickMan (5)</option>
    </select>
    <button name="filter" class="wide">Filter</button>
  </form>
</main>
<footer>
  <span>Copyright &copy; 2019 The Poet Tree Club.</span>
  <nav>
    <a href="logout.php">Log out</a>
    <a href="admin/index.php">Admin</a>
    <a href="about-us.php">About us</a>
  </nav>
</footer>
</body>
</html>