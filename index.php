<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogorithm - Create your blog</title>
  <link rel="stylesheet" href="./Stylesheets/navBar.css">
  <link rel="stylesheet" href="./Stylesheets/heroSection.account.css">
  <link rel="stylesheet" href="./Stylesheets/footerSection.account.css">
  <link rel="stylesheet" href="./Stylesheets/accountSection.account.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php
  include './Components/navBarLogin.php';
  include './Components/heroSectionLogin.php';
  include './Components/footerSectionLogin.php';
  ?>
  <!-- Login/Signup Modal -->
  <div id="authModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>

      <!-- Login Form -->
      <Form action="./login.php" method="post" id="loginForm">
        <h2>Login</h2>
        <input type="text" placeholder="Username" name="username" id="loginUsername" required>
        <input type="password" placeholder="Password" name="password" id="loginPassword" required>
        <button class="loginBtn" type="submit">Login</button>
        <p>Don't have an account? <button class="switchBtn" onclick="switchForm('signup')">Sign Up</button></p>
      </Form>

      <!-- Signup Form -->
      <Form action="./signup.php" method="post" id="signupForm" style="display: none;">
        <h2>Sign Up</h2>
        <input type="text" placeholder="Username" name="username" id="signupUsername" required>
        <input type="email" placeholder="Email" name="email" id="signupEmail" required>
        <input type="password" placeholder="Password" name="password" id="signupPassword" required>
        <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirmPassword" required>
        <button class="signUpBtn" name="submit" type="submit">Sign Up</button>
        <p>Already have an account? <button class="switchBtn" onclick="switchForm('login')">Login</button></p>
      </Form>
    </div>
  </div>
  <script src="./JS/account.js"></script>
</body>

</html>