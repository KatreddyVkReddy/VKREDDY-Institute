<?php
include("db.php");

// Optional: Add new course manually
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = pg_escape_string($_POST['course']);

    $check = pg_query($conn, "SELECT * FROM course_list WHERE course_name = '$course'");
    if (pg_num_rows($check) == 0) {
        pg_query($conn, "INSERT INTO course_list (course_name) VALUES ('$course')");
    }
}

// Fetch distinct courses from enrollments
$result = pg_query($conn, "SELECT DISTINCT courses FROM enrollments ORDER BY courses ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Course List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="form-container">
    <h2>Courses from Enrollments</h2>
    <table>
      <thead>
        <tr>
          <th>Course Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['courses']) . "</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
