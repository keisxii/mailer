<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>MAILER</title>
  <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/112-gmail_email_mail-512.png"
    type="image/mail" />
  <link rel="stylesheet" href="/styles/login.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <style>
    @import url(https://online-fonts.com/fonts/Poppins);

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: #fff;
      padding: 20px;
    }

    .container {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      padding: 40px 25px;
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    img {
      width: 100px;
      height: 100px;
      margin: 0 auto 15px;
    }

    label {
      font-size: 14px;
      display: block;
      margin-top: 10px;
      margin-bottom: 5px;
      text-align: left;
      color: black;
      font-weight: bold;
    }

    input[type="email"],
    input[type="text"],
    input[type="subject"] {
      font-size: 15px;
      width: 100%;
      height: 45px;
      margin-bottom: 5px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    textarea {
      font-size: 15px;
      width: 100%;
      height: 70px;
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .button {
      font-size: 15px;
      padding: 10px;
      height: 45px;
      border-radius: 10px;
      margin-top: 10px;
      margin-bottom: 15px;
      border: none;
      color: white;
      cursor: pointer;
      background-color: #072f5f;
      width: 100%;
    }

    .error {
      color: #721c24;
      background-color: #f8d7da;
      padding: 14px 10px;
      border-radius: 5px;
    }

    .success {
      color: #155724;
      background-color: #d4edda;
      padding: 14px 10px;
      border-radius: 5px;
    }

    @media (max-width: 480px) {
      .container {
        padding: 30px 20px;
      }

      .button {
        font-size: 15px;
        height: 40px;
      }

      img {
        width: 80px;
        height: 80px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>CONTACT FORM</h3>
    <br />
    <?php if (isset($_GET['error'])) { ?>
      <p class="error">
        <?= htmlspecialchars($_GET['error']) ?>
      </p>
    <?php }
    ?>
    <?php if (isset($_GET['success'])) { ?>
      <p class="success">
        <?= htmlspecialchars($_GET['success']) ?>
      </p>
    <?php }
    ?>
    <form method="POST" action="contact.php">
      <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required />
      </div>

      <div>
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div>
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" required />
      </div>

      <div>
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea>
      </div>

      <div>
        <input class="button" type="submit" name="submit" value="Send Email" />
      </div>
    </form>
  </div>

</body>

</html>