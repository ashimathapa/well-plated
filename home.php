<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="img/sanatanlogo.png" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <title>Well Plated</title>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script defer src="script.js"></script>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <h2>Well Plated</h2>

      <ul class="nav__links">
        <li class="nav__item">
          <a class="nav__link" href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="header__title">
      <h1>
        Savor the
        <span class="highlight">Delicious Food &</span>
        <span class="highlight">Drinks Recipes</span> for Every Occasion
      </h1>
      <img src="./img/herosanatan.png" class="header__img" alt="Minimalist bank items" />
    </div>
    <br />
    <div class="search-container marginforsearch">
      <input type="text" id="search-input" placeholder="Search by name..." />
    </div>

    <div id="person-list" style="margin-top: 100px;"></div>

    <script src="search-component.js"></script>
</body>

</html>