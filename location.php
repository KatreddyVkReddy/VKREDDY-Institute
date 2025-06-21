<?php
include("db.php");

// Optional: Add new location manually
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = pg_escape_string($_POST['location']);

    $check = pg_query($conn, "SELECT * FROM location_list WHERE location = '$location'");
    if (pg_num_rows($check) == 0) {
        pg_query($conn, "INSERT INTO location_list (location) VALUES ('$location')");
    }
}

// Fetch all unique locations from enrollments table
$result = pg_query($conn, "SELECT DISTINCT location FROM enrollments ORDER BY location ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Location List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="form-container">
    <h2>Locations from Enrollments</h2>
    <table>
      <thead>
        <tr>
          <th>Location</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['location']) . "</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
