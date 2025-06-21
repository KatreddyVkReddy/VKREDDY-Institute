<!DOCTYPE html>
<html>
<head>
  <title>Access - VK Institute</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="access-container">
    <h2>"WELCOME"</h2>
    <button onclick="showSignup()">Sign Up</button>
    <button onclick="showLogin()">Log In</button>

    <div id="signupForm" style="display:none; margin-top: 20px;">
      <h3>Sign Up</h3>
      <form method="post" action="signup.php">
        <input type="text" name="first_name" placeholder="First Name" required><br>
        <input type="text" name="last_name" placeholder="Last Name" required><br>
        <input type="email" name="email" placeholder="Email ID" required><br>
        <input type="text" name="phone" placeholder="Phone Number" required><br>
        <input type="text" name="username" placeholder="User Name" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Sign Up</button>
      </form>
    </div>

    <div id="loginForm" style="display:none; margin-top: 20px;">
      <h3>Log In</h3>
      <form method="post" action="login.php">
        <input type="text" name="username" placeholder="User Name" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Sign In</button>
      </form>
    </div>
  </div>

  <script>
    function showSignup() {
      document.getElementById('signupForm').style.display = 'block';
      document.getElementById('loginForm').style.display = 'none';
    }

    function showLogin() {
      document.getElementById('loginForm').style.display = 'block';
      document.getElementById('signupForm').style.display = 'none';
    }
  </script>
</body>
</html>
