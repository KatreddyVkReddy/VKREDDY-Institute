<?php
include("db.php");

// Optional: Add manual course fee entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = pg_escape_string($_POST['course']);
    $fee = pg_escape_string($_POST['fee']);

    $check = pg_query($conn, "SELECT * FROM fee_list WHERE course_name = '$course'");
    if (pg_num_rows($check) == 0) {
        pg_query($conn, "INSERT INTO fee_list (course_name, fee_amount) VALUES ('$course', '$fee')");
    }
}

// Get distinct course and fee combinations from enrollments
$result = pg_query($conn, "SELECT DISTINCT courses, fees FROM enrollments ORDER BY courses ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Course Fees</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="form-container">
    <h2>Fees from Enrollments</h2>
    <table>
      <thead>
        <tr>
          <th>Course Name</th>
          <th>Fee</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['courses']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fees']) . "</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
