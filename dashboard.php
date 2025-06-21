<?php
session_start();
// Optionally, check for login session here
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - VK Institute</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="dashboard-container">
    <h2>Welcome to VK's Institute Dashboard</h2>

    <div class="button-grid">
      <button onclick="location.href='enrollment.php'">Enrollment</button>
      <button onclick="location.href='students.php'">Students</button>
      <button onclick="location.href='institute.php'">Institute Name</button>
      <button onclick="location.href='location.php'">Location</button>
      <button onclick="location.href='course.php'">Course</button>
      <button onclick="location.href='fee.php'">Course Fee</button>
    </div>
  </div>
</body>
</html>
