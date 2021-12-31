<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Imploding $whereConditions</title>
</head>
<body>
<main>
  <h1>Imploding $whereConditions</h1>
  <?php
    // Beginning of query
    $query = "SELECT p.poem_id, p.title, p.date_approved, 
    c.category, u.username
FROM poems p
JOIN categories c ON c.category_id = p.category_id
JOIN users u ON u.user_id = p.user_id
WHERE p.date_approved IS NOT NULL";

    // $whereConditions array
    $whereConditions = ['c.category_id = ?', 'u.user_id = ?'];
    echo '<pre>';
    var_dump($whereConditions);
    echo '<hr>';

    // Join array on ' AND ' to create string
    $where = implode($whereConditions, ' AND ');
    echo $where;
    echo '<hr>';

    // Append $where string to $query
    $query .= ' AND ' . $where;
    echo $query;
    echo '</pre>';
  ?>
  </pre>
</main>
</body>
</html>