<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Simple Registration Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link href="<?= base_url("public/aset/css"); ?>/style.css" rel="stylesheet" />
</head>

<body>
  <div class="login-form">
    <form action="<?= site_url('register/create') ?>" method="post" onsubmit="return validateForm()"> <!-- Pointing to the create() method -->
      <h1>Register</h1>
      <div class="content">
        <div class="input-field">
          <input type="text" name="name" id="name" placeholder="UserName" autocomplete="off" required>
          <span class="error-message" id="name-error"></span>
        </div>
        <div class="input-field">
          <input type="text" name="fullName" id="fullName" placeholder="Full Name" autocomplete="off" required>
          <span class="error-message" id="fullName-error"></span>
        </div>
        <div class="input-field">
          <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
          <span class="error-message" id="email-error"></span>
        </div>
        <div class="input-field">
          <input type="password" name="password" id="password" placeholder="Password" autocomplete="new-password" required>
          <span class="error-message" id="password-error"></span>
        </div>
      </div>
      <div class="action">
        <button type="submit" class="action-button">Register</button>
        <a href="<?= site_url('login') ?>" class="action-button">Sign In</a>
      </div>
    </form>
  </div>
  <script src="<?= base_url("public/aset/js"); ?>/script.js"></script>
  <script>
    function validateForm() {
      var name = document.getElementById("name").value;
      var fullName = document.getElementById("fullName").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      var isValid = true;

      // Name validation
      if (name.trim() == "") {
        document.getElementById("name-error").innerText = "Name is required";
        isValid = false;
      } else {
        document.getElementById("name-error").innerText = "";
      }

      // Full Name validation
      if (fullName.trim() == "") {
        document.getElementById("fullName-error").innerText = "Full Name is required";
        isValid = false;
      } else {
        document.getElementById("fullName-error").innerText = "";
      }

      // Email validation
      if (email.trim() == "") {
        document.getElementById("email-error").innerText = "Email is required";
        isValid = false;
      } else {
        document.getElementById("email-error").innerText = "";
      }

      // Password validation
      if (password.trim() == "") {
        document.getElementById("password-error").innerText = "Password is required";
        isValid = false;
      } else {
        document.getElementById("password-error").innerText = "";
      }

      return isValid;
    }
  </script>
</body>

</html>
