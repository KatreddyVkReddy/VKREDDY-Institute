<?php
include("db.php");

// Handle new institute name submission (optional)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $institute = pg_escape_string($_POST['institute_name']);

    $check = pg_query($conn, "SELECT * FROM institute_list WHERE institute_name = '$institute'");
    if (pg_num_rows($check) == 0) {
        pg_query($conn, "INSERT INTO institute_list (institute_name) VALUES ('$institute')");
    }
}

// Fetch all unique institute names from enrollments
$result = pg_query($conn, "SELECT DISTINCT institute_name FROM enrollments ORDER BY institute_name ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Institute List</title>
  <link rel="stylesheet" href="style.css">
</head>

  <div class="form-container">
    <h2>Institutes from Enrollments</h2>
    <table>
      <thead>
        <tr>
          <th>Institute Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['institute_name']) . "</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
