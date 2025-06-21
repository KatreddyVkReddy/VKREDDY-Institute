<?php
include("db.php");

$search = '';
$students = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = pg_escape_string($_POST['search']);
    $query = "SELECT * FROM enrollments 
              WHERE LOWER(student_firstname) LIKE LOWER('%$search%') 
                 OR LOWER(student_lastname) LIKE LOWER('%$search%')
              ORDER BY created_at DESC";
} else {
    $query = "SELECT * FROM enrollments ORDER BY created_at DESC";
}

$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Students - VK Institute</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="students-container">
    <h2>Enrolled Students</h2>

    <form method="post">
      <input type="text" name="search" placeholder="Enter student name" value="<?php echo htmlspecialchars($search); ?>">
      <button type="submit">Search</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Institute</th>
          <th>Location</th>
          <th>Course</th>
          <th>Duration</th>
          <th>Fees</th>
          <th>Enrolled On</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (pg_num_rows($result) > 0) {
          while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['student_firstname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['student_lastname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['institute_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['location']) . "</td>";
            echo "<td>" . htmlspecialchars($row['courses']) . "</td>";
            echo "<td>" . htmlspecialchars($row['course_duration']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fees']) . "</td>";
            echo "<td>" . date("Y-m-d", strtotime($row['created_at'])) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='10'>No records found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
