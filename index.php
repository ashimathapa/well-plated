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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <header class="header">
    <nav class="nav">
      <h2>Well Plated</h2>

      <ul class="nav__links">
        <li class="nav__item">
          <a class="nav__link nav__link--btn btn--show-modal" href="#login">login</a>
        </li>
        <li class="nav__item">
          <a class="nav__link nav__link--btn btn--show-modal" href="#sign-up">Sign Up</a>
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
  </header>

  <footer style="text-align: center;">
    &copy; Copyright by
    Well Plated
    2023. All Rights Reserved.
  </footer>

  <div class="modal hidden" id="login">
    <button class="btn--close-modal">&times;</button>
    <h2 class="modal__header">
      Get recipe from <br />
      <span class="highlight">Well Plated</span>
    </h2>
    <form class="modal__form">
      <label>Email</label>
      <input type="text" id="loginemail" name="loginemail" />
      <label>Password</label>
      <input type="password" id="loginpassword" name="loginpassword" />
      <button class="btn linked-to" id="loginformsubmit">login</button>
    </form>
  </div>
  <div class="overlay hidden"></div>

  <div class="modal hidden" id="sign-up">
    <button class="btn--close-modal">&times;</button>
    <h2 class="modal__header">
      Taste from Well Plated <br />
      in just <span class="highlight">5 minutes</span>
    </h2>
    <form class="modal__form" id="signupform">
      <label>First Name</label>
      <input type="text" name="signupfirstname" id="signupfirstname" />
      <label>Last Name</label>
      <input type="text" name="signuplastname" id="signuplastname" />
      <label>Email </label>
      <input type="email" name="signupemail" id="signupemail" />
      <label>Password</label>
      <input type="password" name="signuppassword" id="signuppassword" />
      <button class="btn linked-to" id="signupformsubmit">sign up &rarr;</button>
    </form>
  </div>
  <div class="overlay hidden"></div>
  <script>
    // on submit for signup form
    $(document).ready(function() {
      $('#signupformsubmit').click(function(e) {
        e.preventDefault();
        var url = "http://localhost/well-plated/signup.php"; // the script where you handle the form input.
        $.ajax({
          type: "POST",
          url: url,
          data: {
            firstname: $("#signupfirstname").val(),
            lastname: $("#signuplastname").val(),
            email: $("#signupemail").val(),
            password: $("#signuppassword").val(),
          },
          success: function(data) {
            var data = JSON.parse(data);
            if (data.success == true) {
              $(".modal").addClass("hidden");
            }
            $("#signupfirstname").val("");
            $("#signuplastname").val("");
            $("#signupemail").val("");
            $("#signuppassword").val("");
            alert(data.message);
          },
          error: function(data) {
            alert("Something went wrong");
          }
        });
      });

      $('#loginformsubmit').click(function(e) {
        e.preventDefault();
        console.log("clicked");
        var url = "http://localhost/well-plated/login.php"; // the script where you handle the form input.
        $.ajax({
          type: "POST",
          url: url,
          data: {
            email: $("#loginemail").val(),
            password: $("#loginpassword").val(),
          },
          success: function(data) {
            var data = JSON.parse(data);
            if (data.success == true) {
              $(".modal").addClass("hidden");
              window.location.href = "http://localhost/well-plated/home.php";
              alert(data.message);
            } else {
              alert(data.message);
            }
          },
          error: function(data) {
            alert("Something went wrong");
          }
        });
      });
    });
  </script>
</body>

</html>