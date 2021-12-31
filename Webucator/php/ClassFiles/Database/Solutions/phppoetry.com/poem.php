<?php
  $dsn = 'mysql:host=localhost;dbname=poetree';
  $username = 'root';
  $password = 'pwdpwd';
  $db = new PDO($dsn, $username, $password);
  $poemId = $_GET['poem-id'];
  $query = "SELECT u.username,
    p.title, p.poem, p.date_submitted, p.date_approved
    FROM users u
      JOIN poems p ON u.user_id = p.user_id
    WHERE p.poem_id = ?";
  $stmt = $db->prepare($query);
  $stmt->execute([$poemId]);
  $row = $stmt->fetch();
  
  if ($row) {
    $title = $row['title'];
    $authorUserName = $row['username'];
    $dateSubmitted = $row['date_submitted'];
    $dateApproved = $row['date_approved'];
    $poem = $row['poem'];
  } else {
    $title = 'Poem Not Found';
  }
  
  $pageTitle = $title;
  require 'includes/header.php';
?>
<main id="poem">
  <h1><?= $title ?></h1>
  <?php if ($row) { ?>
    <div id="submission-status">
      Submitted on <?= date('m/d/Y', strtotime($dateSubmitted)) ?>
      at <?= date('g:iA', strtotime($dateSubmitted)) ?>
      by <?= $authorUserName ?>
      <a href='#'>Edit</a>
      <a href='#'>Delete</a>
    </div>
    <div id="approval-status">
      Approved: <?= date('m/d/Y', strtotime($dateApproved)) ?>
    </div>
    <article class="poem">
      <?= nl2br($poem) ?>
    </article>
  <?php } else { ?>
    <p>Sorry, we couldn't find the poem you're looking for.</p>
  <?php } ?>
  <nav>
    <ul>
      <li>
        <i class="fas fa-circle"></i>
        <a href="#">More Funny Poems</a>
      </li>
      <li>
        <i class="fas fa-circle"></i>
        <a href="#">More Poems by LimerickMan</a>
      </li>
      <li>
        <i class="fas fa-circle"></i>
        <a href="poems.php">All Poems</a>
      </li>
    </ul>
  </nav>
</main>
<?php
  require 'includes/footer.php';
?>