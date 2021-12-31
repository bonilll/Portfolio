<?php
  $pageTitle = 'Admin Users';
  $pathStart = '../';
  require '../includes/header.php';

  if ( !isAdmin($currentUserId) ) {
    // How did you get here?
    header("Location: ../index.php");
  }

  $offset = $_GET['offset'] ?? 0;
  $offset = (int) $offset;
  $rowsToShow = 2;

  $order = $_GET['order'] ?? 'date_registered';
  $orderAllowed = ['date_registered',
                  'last_name',
                  'username',
                  'num_poems'];
  if (!in_array($order, $orderAllowed)) {
    $order = 'date_registered';
  }
  
  $dir = $_GET['dir'] ?? 'asc';
  $dirAllowed = ['asc', 'desc'];
  if (!in_array($dir, $dirAllowed)) {
    $dir = 'asc';
  }

  $query = "SELECT u.user_id, u.username, u.first_name, u.last_name,
      u.email, u.date_registered, u.registration_confirmed,
      COUNT(p.poem_id) AS num_poems
    FROM users u
      LEFT JOIN poems p ON u.user_id = p.user_id
    GROUP BY u.user_id, u.username, u.first_name, u.last_name,
      u.email, u.date_registered, u.registration_confirmed
    ORDER BY $order $dir 
    LIMIT $offset, $rowsToShow"; 

  try {
    $stmt = $db->prepare($query);
    if (!$stmt->execute()) {
      $errorMsg = $stmt->errorInfo()[2] . ": $query";
      logError($errorMsg);
    }
  } catch (PDOException $e) {
    logError($e, true);
  }

  $qUserCount = "SELECT COUNT(*) AS num FROM users";
  
  try {
    $stmtUserCount = $db->prepare($qUserCount);
    if (!$stmtUserCount->execute()) {
      $errorMsg = $stmtUserCount->errorInfo()[2] . ": $query";
      logError($errorMsg); 
    }
  } catch (PDOException $e) {
    logError($e, true); // Redirect to error page
  }
  $userCount = $stmtUserCount->fetch()['num'];

  $prevOffset = max($offset - $rowsToShow, 0);
  $nextOffset = $offset + $rowsToShow;

  $href = "users.php?";
  $prev = $href . "offset=$prevOffset&order=$order&dir=$dir";
  $next = $href . "offset=$nextOffset&order=$order&dir=$dir";

  /* CONSTRUCT THE LINKS FOR THE HEADERS */

  // Default all directions to ascending
  $dirName = 'asc';
  $dirUsername = 'asc';
  $dirNumPoems = 'asc';
  $dirRegistered = 'asc';

  // If the current direction is 'asc', switch the direction
  //  for the header that is currently being sorted on
  if ($dir === 'asc') {
    switch ($order) {
      case 'last_name':
        $dirName = 'desc';
        break;
      case 'username':
        $dirUsername = 'desc';
        break;
      case 'num_poems':
        $dirNumPoems = 'desc';
        break;
      case 'date_registered':
        $dirRegistered = 'desc';
        break;
    }
  }

  $nameLink = $href . "order=last_name&dir=$dirName";
  $usernameLink = $href . "order=username&dir=$dirUsername";
  $poemsLink = $href . "order=num_poems&dir=$dirNumPoems";
  $registeredLink = $href . "order=date_registered&dir=$dirRegistered";
?>
<main id="users" class="admin">
  <h1><?= $pageTitle ?></h1>
  <?php require 'includes/nav.php'; ?>
  <table>
    <caption>Total Users: <?= $userCount ?></caption>
    <thead>
      <tr>
        <th>
          <a href="<?= $nameLink ?>">Name</a>
        </th>
        <th>
          <a href="<?= $usernameLink ?>">Username</a>
        </th>
        <th>
          <a href="<?= $poemsLink ?>">Poems</a>
        </th>
        <th>
          <a href="<?= $registeredLink ?>">Registered</a>
        </th>
    </tr>
    </thead>
    <tbody>
      <?php 
        while ($row = $stmt->fetch()) {
          $registered = strtotime($row['date_registered']);
          $dateRegistered = date('m/d/Y', $registered);
          echo '<tr>
            <td>
              <a href="../my-account.php?user-id=' . $row['user_id'] . '">' .
              $row['last_name'] . ', ' . $row['first_name'] . '</a>
            </td>
            <td>' . $row['username'] . '</td>
            <td>' . $row['num_poems'] . '</td>
            <td>' . $dateRegistered . '</td>
          </tr>';
        }
      ?>
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
        <td colspan="3"></td>
        <?php 
          if ($nextOffset >= $userCount) {
            echo "<td class='disabled'>Next</td>";
          } else {
            echo "<td><a href='$next'>Next</a></td>";
          }
        ?>
      </tr>
    </tfoot>
  </table>
  
</main>
<?php
  require '../includes/footer.php';
?>