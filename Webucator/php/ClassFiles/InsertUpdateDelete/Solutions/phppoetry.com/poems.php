<?php
  $pageTitle = 'Poems';
  require 'includes/header.php';

  $offset = $_GET['offset'] ?? 0;
  $offset = (int) $offset;
  $rowsToShow = 2;

  $order = $_GET['order'] ?? 'date_approved';
  $orderAllowed = ['date_approved',
                  'title',
                  'category',
                  'username'];
  if (!in_array($order, $orderAllowed)) {
    $order = 'date_approved';
  }
  
  $dir = $_GET['dir'] ?? 'desc';
  $dirAllowed = ['asc', 'desc'];
  if (!in_array($dir, $dirAllowed)) {
    $dir = 'asc';
  }

  $query = "SELECT p.poem_id, p.title, p.date_approved, 
  c.category, u.username
          FROM poems p
          JOIN categories c ON c.category_id = p.category_id
          JOIN users u ON u.user_id = p.user_id
          WHERE (p.date_approved IS NOT NULL
            OR u.user_id = ?)";


  $selCatId = $_GET['cat'] ?? 0; // category_id
  $selUserId = $_GET['user'] ?? 0; // user_id
  $whereConditions = [];
  $params = [$currentUserId];

  if ($selCatId) {
    $whereConditions[] = "c.category_id = ?";
    $params[] = $selCatId;
  }
  
  if ($selUserId) {
    $whereConditions[] = "u.user_id = ?";
    $params[] = $selUserId;
  }

  if ($whereConditions) {
    $where = implode($whereConditions, ' AND ');
    $query .= ' AND ' . $where;
  }

  $query .= " ORDER BY  $order $dir
          LIMIT $offset, $rowsToShow";

  try {
    $stmt = $db->prepare($query);
    if (!$stmt->execute($params)) {
      $errorMsg = $stmt->errorInfo()[2] . ": $query";
      logError($errorMsg);
    }
  } catch (PDOException $e) {
    logError($e, true);
  }

  $qPoemCount = "SELECT COUNT(p.poem_id) AS num
  FROM poems p
    JOIN categories c ON c.category_id = p.category_id
    JOIN users u ON u.user_id = p.user_id
  WHERE (p.date_approved IS NOT NULL
            OR u.user_id = ?)";

  if ($whereConditions) {
    $where = implode($whereConditions, ' AND ');
    $qPoemCount .= ' AND ' . $where;
  }

  try {
    $stmtPoemCount = $db->prepare($qPoemCount);
    if (!$stmtPoemCount->execute($params)) {
      $errorMsg = $stmtPoemCount->errorInfo()[2] . ": $query";
      logError($errorMsg);
    }
  } catch (PDOException $e) {
    logError($e, true);
  }
  $poemCount = $stmtPoemCount->fetch()['num'];

  $prevOffset = max($offset - $rowsToShow, 0);
  $nextOffset = $offset + $rowsToShow;

  $qCategories = "SELECT c.category_id, c.category,
    COUNT(p.poem_id) AS num_poems
  FROM categories c
    JOIN poems p ON c.category_id = p.category_id
  WHERE p.date_approved IS NOT NULL
  GROUP BY c.category_id
  ORDER BY c.category";

  try {
    $stmtCats = $db->prepare($qCategories);
    if (!$stmtCats->execute()) {
      $errorMsg = $stmtCats->errorInfo()[2] . ": $query";
      logError($errorMsg);
    }
  } catch (PDOException $e) {
    logError($e, true);
  }

  $qUsers = "SELECT u.user_id, u.username, 
    COUNT(p.poem_id) AS num_poems
  FROM users u
    JOIN poems p ON u.user_id = p.user_id
  WHERE p.date_approved IS NOT NULL
  GROUP BY u.user_id
  ORDER BY u.username";

  try {
    $stmtUsers = $db->prepare($qUsers);
    if (!$stmtUsers->execute()) {
      $errorMsg = $stmtUsers->errorInfo()[2] . ": $query";
      logError($errorMsg);
    }
  } catch (PDOException $e) {
    logError($e, true);
  }

  $href = "poems.php?cat=$selCatId&user=$selUserId&";
  $prev = $href . "offset=$prevOffset&order=$order&dir=$dir";
  $next = $href . "offset=$nextOffset&order=$order&dir=$dir";

  /* CONSTRUCT THE LINKS FOR THE HEADERS */

  // Default all directions to ascending
  $dirTitle = 'asc';
  $dirCategory = 'asc';
  $dirUsername = 'asc';
  $dirPublished = 'asc';

  // If the current direction is 'asc', switch the direction
  //  for the header that is currently being sorted on
  if ($dir === 'asc') {
    switch ($order) {
      case 'title':
        $dirTitle = 'desc';
        break;
      case 'category':
        $dirCategory = 'desc';
        break;
      case 'username':
        $dirUsername = 'desc';
        break;
      case 'date_approved':
        $dirPublished = 'desc';
        break;
    }
  }

  $titleLink = $href . "order=title&dir=$dirTitle";
  $categoryLink = $href . "order=category&dir=$dirCategory";
  $usernameLink = $href . "order=username&dir=$dirUsername";
  $publishedLink = $href . "order=date_approved&dir=$dirPublished";
?>
<main id="poems">
  <h1><?= $pageTitle ?></h1>
  <table>
    <caption>Total Poems: <?= $poemCount ?></caption>
    <thead>
      <tr>
        <th>
          <a href="<?= $titleLink ?>">Poem</a>
        </th>
        <th>
          <a href="<?= $categoryLink ?>">Category</a>
        </th>
        <th>
          <a href="<?= $usernameLink ?>">Author</a>
        </th>
        <th>
          <a href="<?= $publishedLink ?>">Published</a>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = $stmt->fetch()) { 
          $cls = ($row['date_approved'])
               ? 'normal'
               : 'pending-approval';
          if ($row['date_approved']) {
            $approved = strtotime($row['date_approved']);
            $published = date('m/d/Y', $approved);
          } else {
            $published = 'N/A';
          }
      ?>
        <tr class="<?= $cls ?>">
          <td>
            <a href="poem.php?poem-id=<?= $row['poem_id'] ?>">
              <?= $row['title'] ?>
            </a>
          </td>
          <td><?= $row['category'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $published ?></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot class="pagination">
      <tr>
        <?php 
          if ($offset === 0) {
            echo "<td class='disabled'>Previous</td>";
          } else {
            echo "<td><a href='$prev'>Previous</a></td>";
          }
        ?>
        <td colspan="2"></td>
        <?php 
          if ($nextOffset >= $poemCount) {
            echo "<td class='disabled'>Next</td>";
          } else {
            echo "<td><a href='$next'>Next</a></td>";
          }
        ?>
      </tr>
    </tfoot>
  </table>
  <h2>Filtering</h2>
  <form method="get" action="poems.php">
    <input type="hidden" name="order" value="<?= $order ?>">
    <input type="hidden" name="dir" value="<?= $dir ?>">
    <label for="cat">Category:</label>
    <select name="cat" id="cat">
      <option value="0">All</option>
      <?php
        while ($row = $stmtCats->fetch()) {
          $category = $row['category'];
          $numPoems = $row['num_poems'];
          $categoryId = $row['category_id'];
          $selected = $categoryId === $selCatId ? 'selected' : '';
          echo "<option value='$categoryId' $selected>
            $category ($numPoems)
          </option>";
        }
      ?>
    </select>
    <label for="user">Author:</label>
    <select name="user" id="user">
      <option value="0">All</option>
      <?php
        while ($row = $stmtUsers->fetch()) {
          $username = $row['username'];
          $userId = $row['user_id'];
          $numPoems = $row['num_poems'];
          $selected = $userId === $selUserId ? 'selected' : '';
          echo "<option value='$userId' $selected>
            $username ($numPoems)
          </option>";
        }
      ?>
    </select>
    <button name="filter" class="wide">Filter</button>
  </form>
</main>
<?php
  require 'includes/footer.php';
?>