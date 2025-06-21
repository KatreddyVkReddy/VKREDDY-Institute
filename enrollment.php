<!DOCTYPE html>
<html>
<head>
  <title>Enrollment - VK Institute</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h2>Student Enrollment Form</h2>
    <form action="submit_enrollment.php" method="post">
      <input type="text" name="student_firstname" placeholder="Student First Name" required><br>
      <input type="text" name="student_lastname" placeholder="Student Last Name" required><br>
      <input type="email" name="email" placeholder="Email ID" required><br>
      <input type="text" name="phone_number" placeholder="Phone Number" required><br>
      <input type="text" name="institute_name" placeholder="Institute Name" required><br>
      <input type="text" name="location" placeholder="Location" required><br>
      <input type="text" name="courses" placeholder="Course" required><br>
      <input type="text" name="course_duration" placeholder="Course Duration" required><br>
      <input type="number" name="fees" placeholder="Course Fee" required><br>

      <button type="submit">Submit Enrollment</button>
    </form>
  </div>
</body>
</html>
