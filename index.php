<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mailer</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/6806/6806987.png" type="image/mail" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">
  <div class="bg-white rounded-md shadow-md w-full max-w-2xl">
    <!-- Header -->
    <div class="bg-[#3b4455] text-white p-4 rounded-t-md flex items-center justify-between">
      <h1 class="text-lg font-semibold">Contact Form</h1>
      <div class="flex items-center gap-2">
        <div class="w-3 h-3 rounded-full bg-red-500"></div>
        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
        <div class="w-3 h-3 rounded-full bg-green-500"></div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="p-2 border-b border-gray-200">
      <div class="flex items-center gap-2">
        <button class="rounded-md hover:bg-gray-200" style="padding: 1px 5px;">
          <span class="material-symbols-outlined" style="margin-top: 5px;">
            arrow_back
          </span>
        </button>
        <button class="rounded-md hover:bg-gray-200" style="padding: 1px 5px;">
          <span class="material-symbols-outlined" style="margin-top: 5px;">
            arrow_forward
          </span>
        </button>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="rounded-md hover:bg-gray-200"
          style="padding: 1px 5px; display: inline-block;">
          <span class="material-symbols-outlined" style="margin-top: 5px;">
            refresh
          </span>
        </a>
        <div class="flex-1">
          <input type="text" placeholder="Search"
            class="w-full p-1.5 rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-300">
        </div>
        <button class="rounded-md hover:bg-gray-200" style="padding: 1px 5px;">
          <span class="material-symbols-outlined" style="margin-top: 5px;">
            menu
          </span>
        </button>
      </div>

      <?php if (isset($_GET['error'])) { ?>
        <div class="error p-6">
          <p class="p-3 w-full rounded-md text-sm font-medium text-center text-red-800 bg-red-100 border border-red-300">
            <?= htmlspecialchars($_GET['error']) ?>
          </p>
        </div>
      <?php }
      ?>
      <?php if (isset($_GET['success'])) { ?>
        <div class="success p-6">
          <p
            class=" p-3 w-full rounded-md text-sm font-medium text-center text-green-800 bg-green-100 border border-green-300">
            <?= htmlspecialchars($_GET['success']) ?>
          </p>
        </div>
      <?php }
      ?>

      <!-- Form -->
      <form method="POST" action="contact.php" style="padding: 1px 25px 5px 25px; ">
        <div class="space-y-4 mb-2 mt-1">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name"
              class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-300"
              required>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email"
              class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-300"
              required>
          </div>
          <div>
            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
            <input type="text" id="subject" name="subject"
              class="mt-1 p-2 w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-300"
              required>
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <div id="message" name="message" class="bg-white h-32 border border-gray-300 p-2"></div>
          </div>
        </div>
        <div class="flex justify-end">
          <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            SEND
          </button>
        </div>
      </form>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
      var quill = new Quill('#message', {
        theme: 'snow',
        placeholder: 'Your message here...',
        modules: {
          toolbar: [
            ['bold', 'italic'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            ['link']
          ]
        }
      });

      const form = document.querySelector('form');
      form.addEventListener('submit', function () {
        const messageInput = document.createElement('input');
        messageInput.setAttribute('type', 'hidden');
        messageInput.setAttribute('name', 'message');
        messageInput.setAttribute('value', quill.root.innerHTML);
        form.appendChild(messageInput);
      });
    </script>
</body>

</html>