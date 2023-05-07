<?php
session_start();
if (isset($_POST['submit'])) {
  $conn = mysqli_connect("localhost", "root", "", "railway");
  if (!$conn) {
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: ' . mysqli_connect_error());
  }
  $email = $_POST['email'];
  $pw = $_POST['pw'];
  $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pw'";
  $_SESSION['user']=$email;

  $sql_result = mysqli_query($conn, $sql) or die('request "Could not execute SQL query" ' . $sql);
  $user = mysqli_fetch_assoc($sql_result);
  if (!empty($user)) {
    $_SESSION['user_info'] = $user['email'];
    $message = 'Logged in successfully';
  } else {
      $message = 'Wrong email or password.';
  }
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8" />
  <title>RailReserv - Login / Sign Up</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<script type="text/javascript">
  function validate() {
    var EmailId = document.getElementById("email");
    var atpos = EmailId.value.indexOf("@");
    var dotpos = EmailId.value.lastIndexOf(".");
    var pw = document.getElementById("pw");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= EmailId.value.length) {
      alert("Enter valid email-ID");
      EmailId.focus();
      return false;
    }
    if (pw.value.length < 8) {
      alert("Password consists of atleast 8 characters");
      pw.focus();
      return false;
    }
    return true;
  }
</script>

<body>
  <div class="wrapper">
    <header>
      <div class="Upper">
        <a href="index.html"><img src="./railway_logo.gif.png" alt="Railway Icon" width="80px" height="80px" /></a>
        Railreserv-One Stop for All Train Bookings and Browsing
      </div>
      <?php
            include('navbar.php');
            ?>
      <h2><br />Login to your RailReserv account</h2>
    </header>


    <form method="post" id="login" name="login" style="text-align: center" onsubmit="return validate()">
      <label for="email">Email:</label><br />
      <input type="text" id="email" name="email" /><br />
      <label for="password">Password:</label><br />
      <input type="password" id="pw" name="pw" /><br /><br />
      <input type="submit" value="submit" name="submit" id="submit" />

    </form>


    <p style="text-align: center">
      Don't have an account? <a href="Signup.html">Sign Up</a>
    </p>

    <p style="text-align: center">
      <a href="forgot_pass.php">Forgot Password<br /><br /><br /></a>
    </p>

    <p style="text-align: center">
      <a href="javascript:confirmRefresh();">Refresh Page</a>
    </p>

    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>© 2023-2024 Railreserv, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      function confirmRefresh() {
        var okToRefresh = confirm("Changes will not be saved");
        if (okToRefresh) {
          setTimeout("location.reload(true);", 1500);
        }
      }
    </script>
  </div>

</body>

</html>