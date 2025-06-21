<?php
include("db.php"); // Make sure db.php connects to PostgreSQL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = pg_escape_string($_POST['student_firstname']);
    $lname = pg_escape_string($_POST['student_lastname']);
    $email = pg_escape_string($_POST['email']);
    $phone = pg_escape_string($_POST['phone_number']);
    $institute = pg_escape_string($_POST['institute_name']);
    $location = pg_escape_string($_POST['location']);
    $course = pg_escape_string($_POST['courses']);
    $duration = pg_escape_string($_POST['course_duration']);
    $fees = pg_escape_string($_POST['fees']);

    $query = "INSERT INTO enrollments (student_firstname, student_lastname, email, phone_number, institute_name, location, courses, course_duration, fees)
              VALUES ('$fname', '$lname', '$email', '$phone', '$institute', '$location', '$course', '$duration', '$fees')";

    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Enrollment successful!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . pg_last_error($conn) . "'); window.history.back();</script>";
    }
}
?>
