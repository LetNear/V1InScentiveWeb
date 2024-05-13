<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link href="<?= base_url("public/aset/css"); ?>/style.css" rel="stylesheet" />
</head>

<body>
  <div class="login-form">
    <form action="<?= site_url('/login/authenticate') ?>" method="POST"> <!-- Traditional login -->
      <h1>Login</h1>
      <div class="content">
        <div class="input-field">
          <input type="email" name="email" placeholder="Email" autocomplete="nope">
        </div>
        <div class="input-field">
          <input type="password" name="password" placeholder="Password" autocomplete="new-password">  
        </div>
      </div>
      <div class="action">
        <a class="action-button" href="<?= site_url('register') ?>">Register</a>
        <button type="submit">Sign in</button>
      </div>
    </form>
    <div class="social-login">
      <!-- Google login button -->
      <a href="<?= site_url('login/googleAuth') ?>" class="google-btn">
        Login with Google
      </a>
    </div>
  </div>
  <script src="<?= base_url("public/aset/js"); ?>/script.js"></script>
</body>

</html>
