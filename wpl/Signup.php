<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "railway");
if (!$conn) {
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: ' . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $adn = $_POST['adn'];
    $uname = $_POST['uname'];
    $pw = $_POST['pw'];
    $dob = $_POST['dob'];
    $cpw = $_POST['cpw'];
    $email = $_POST['email'];
    $sql = "INSERT INTO user (f_name, l_name, adn, uname, password, dob, email) VALUES ('$fname', '$lname', '$adn', '$uname', '$pw', '$dob', '$email');";
    if (mysqli_query($conn, $sql)) {
        $message = "You have been successfully registered";
    } else {
        $message = "Could not insert record";
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Create Account - RailReserv</title>
    <link rel="icon" href="favicon.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="Upper">
                <a href="index.html"><img src="./railway_logo.gif.png" alt="Railway Icon" width="80px" height="80px"></a>
                Railreserv-One Stop for All Train Bookings and Browsing
            </div>
            <?php
            include('navbar.php');
            ?>
            <h2 style="text-align:center"><br><br><br>Create your RailReserv account</h2>
        </header>

        <form method="post" style="text-align:center" onsubmit="return validate()">
            <label for="fname">First Name:</label><br>
            <input type="text" id="fname" name="fname"><br>

            <label for="lname">Last Name:</label><br>
            <input type="text" id="lname" name="lname"><br>

            <label for="adn">Aadhar Card Number:</label><br>
            <input type="text" id="adn" name="adn"><br>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>

            <label for="DOB">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob"><br>

            <label for="username">Set Username:</label><br>
            <input type="text" id="uname" name="uname"><br>

            <label for="password">Set Password:</label><br>
            <input type="password" id="pw" name="pw"><br>

            <label for="cpassword">Confirm Password:</label><br>
            <input type="password" id="cpw" name="cpw"><br>

            <input type="checkbox" name="agreement" value="on">I have read all the Terms & Conditions<br>

            <input type="checkbox" name="agreement" value="on">I agree to all the Terms & Conditions<br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
        <SCRIPT src="validation.js"></SCRIPT>
        <br><br><br>
        <p style="text-align: center">
            <a href="javascript:confirmRefresh();">Refresh Page</a>
        </p>

        <footer class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>© 2023-2024 Railreserv, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </div>
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
</body>

</html>