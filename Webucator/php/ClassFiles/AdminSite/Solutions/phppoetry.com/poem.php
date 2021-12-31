<?php
  require_once 'config.php';
  require_once 'includes/utilities.php';
  $db = dbConnect();
  $poemId = $_GET['poem-id'];
  $query = "SELECT u.username, u.user_id,
    p.title, p.poem, p.date_submitted, p.date_approved,
    c.category_id, c.category
    FROM users u
      JOIN poems p ON u.user_id = p.user_id
      JOIN categories c ON c.category_id = p.category_id
    WHERE p.poem_id = ?";

  try {
    $stmt = $db->prepare($query);
    if (!$stmt->execute([$poemId])) {
      $errorMsg = $stmt->errorInfo()[2] . ": $query";
      logError($errorMsg);
    }
  } catch (PDOException $e) {
    logError($e, true);
  }
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
      <?php
        if (isPoemAuthor($poemId)) {
          echo "<a href='poem-edit.php?poem-id=$poemId'>Edit</a>
          <a href='poem-delete.php?poem-id=$poemId'>Delete</a>";
        }
      ?>
    </div>
    <div id="approval-status">
      <?php
        if ($dateApproved) {
          echo 'Approved: ' . date('m/d/Y', strtotime($dateApproved));
        } else {
          echo 'Pending Approval';
        }
      ?>
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