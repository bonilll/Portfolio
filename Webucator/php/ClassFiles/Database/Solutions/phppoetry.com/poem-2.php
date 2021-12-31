<?php
  $dsn = 'mysql:host=localhost;dbname=poetree';
  $username = 'root';
  $password = 'pwdpwd';
  $db = new PDO($dsn, $username, $password);
  $poemId = $_GET['poem-id'];
  $query = "SELECT u.username, u.user_id,
    p.title, p.poem, p.date_submitted, p.date_approved,
    c.category_id, c.category
    FROM users u
      JOIN poems p ON u.user_id = p.user_id
      JOIN categories c ON c.category_id = p.category_id
    WHERE p.poem_id = ?";
  $stmt = $db->prepare($query);
  $stmt->execute([$poemId]);
  $row = $stmt->fetch();
  
  if ($row) {
    $title = $row['title'];
    $authorUserId = $row['user_id'];
    $authorUserName = $row['username'];
    $dateSubmitted = $row['date_submitted'];
    $dateApproved = $row['date_approved'];
    $poem = $row['poem'];
    $categoryId = $row['category_id'];
    $category = $row['category'];
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
      <?php if ($row) { ?>
        <li>
          <i class="fas fa-circle"></i>
          <a href="poems.php?cat=<?= $categoryId ?>">
            More <?= $category ?> Poems
          </a>
        </li>
        <li>
          <i class="fas fa-circle"></i>
          <a href="poems.php?user=<?= $authorUserId ?>">
            More Poems by <?= $authorUserName ?>
          </a>
        </li>
      <?php } ?>
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