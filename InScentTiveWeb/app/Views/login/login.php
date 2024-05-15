<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <style>
    body {
      background-color: #f4f4f9; /* Light lavender background */
      color: #333;
      font-family: 'Rubik', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-form {
      background-color: white;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 40px;
      width: 320px;
      text-align: center;
    }

    .login-form h1 {
      color: #5c677d; /* Soft dark gray */
      margin-bottom: 20px;
    }

    .login-form .input-field {
      margin-bottom: 20px;
    }

    .login-form .input-field input {
      border: 1px solid #ced4da;
      padding: 12px 15px;
      border-radius: 5px;
      width: calc(100% - 30px); /* Full width minus padding */
      box-sizing: border-box; /* Includes padding and border in width */
      font-size: 16px;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .login-form .input-field input:focus {
      border-color: #8aacc8; /* Soft blue */
      box-shadow: 0 0 8px rgba(138, 172, 200, 0.5);
      outline: none;
    }

    .login-form .action {
      margin-top: 30px;
    }

    .login-form .action button,
    .login-form .action a {
      background-color: #6a1b9a; /* Deep purple */
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s, transform 0.2s;
      margin: 5px;
    }

    .login-form .action button:hover,
    .login-form .action a:hover {
      background-color: #4a0072; /* Deeper purple */
      transform: translateY(-2px);
    }

    .login-form .social-login a {
      background-color: #dd4b39; /* Google's brand red */
      color: white;
      padding: 12px 20px;
      border-radius: 5px;
      display: block;
      text-align: center;
      margin-top: 20px;
      transition: background-color 0.3s, transform 0.2s;
    }

    .login-form .social-login a:hover {
      background-color: #c23321; /* Darker red */
      transform: translateY(-2px);
    }

    .login-form .input-field input:focus::placeholder {
      color: transparent; /* Hide placeholder text on focus */
    }

    .login-form .input-field input::placeholder {
      color: #ced4da; /* Light grey placeholder text */
      transition: color 0.3s;
    }
  </style>
</head>

<body>
  <div class="login-form">
    <form action="<?= site_url('/login/authenticate') ?>" method="POST">
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
      <a href="<?= site_url('login/googleAuth') ?>" class="google-btn">
        Login with Google
      </a>
    </div>
  </div>
  <script src="<?= base_url("public/aset/js"); ?>/script.js"></script>
</body>

</html>
