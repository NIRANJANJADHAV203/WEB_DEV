<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "railway");
if (!$conn) {
    echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: ' . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $pnr = $_POST['pnr'];
    $sql = "SELECT t_status FROM tickets WHERE PNR= '$pnr'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row == NULL)    echo "<script type='text/javascript'>alert('PNR not found');</script>";
    else echo "<script type='text/javascript'>alert('Your status is ' +'$row[t_status]');</script>";
}
if (isset($_POST['cancel'])) {
    $pnr = $_POST['pnr'];
    $sql = "DELETE FROM tickets WHERE PNR=$pnr;";
    if (mysqli_query($conn, $sql))
        echo "<script type='text/javascript'>alert('Your ticket has been cancelled');</script>";
    else echo "<script type='text/javascript'>alert('Cancellation failed');</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Search Ticket</title>
    <link rel="icon" href="favicon.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="styles.css" />
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
            <h2 style="text-align:center"><br><br><br>Search Your Ticket</h2>
        </header>
        <form method="post" style="text-align:center">
            <label for="pnr">Enter PNR Number</label><br>
            <input type="text" id="pnr" name="pnr"><br>
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
                <footer class="container">
                    <p class="float-right"><a href="#">Back to top</a></p>
                    <p>© 2023-2024 Railreserv, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
                </footer>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </div>
    </div>
</body>

</html>