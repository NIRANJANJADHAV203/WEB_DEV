<?php
// Connection details to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if (isset($_POST['submit'])){
    
    $name = $_POST['p_name'];
    $age = $_POST['age'];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $date = $_POST["date"];
    
    // Check if there are available seats for the given date, from and to stations
    $sql = "SELECT * FROM bookings WHERE date='$date' AND `from`='$from' AND `to`='$to'";
    $result = $conn->query($sql);
    $booked_seats = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $booked_seats += $row["seats"];
        }
    }
    $available_seats = 100 - $booked_seats;
    
    // Check if there are enough available seats for the user's request
    $requested_seats = 1; // Assuming the user is booking only one seat
    if ($available_seats >= $requested_seats) {
        // Insert booking into the database
        $sql = "INSERT INTO bookings (p_name, age, `from`, `to`, date, seats) VALUES ('$name', '$age', '$from', '$to', '$date', '$requested_seats')";
        if ($conn->query($sql) === TRUE) {
            echo "Booking successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, no seats available for the given date, from and to stations.";
    }
    
    $conn->close();
}
?>

</script>

<!DOCTYPE html>
<html lang="en">
    <title>Bookings</title>
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
    <body>
        <script>
            document.getElementById('submit-btn').addEventListener('click', function(event) {
                event.preventDefault(); // prevent form submission
                
                // Get the values of the input fields
                var nameValue = document.getElementById('name').value;
                var ageValue = document.getElementById('age').value;
                
                // Insert the values into the HTML
                document.getElementById('output').innerHTML = "Name: " + nameValue + "<br>Email: " + emailValue;
            });
            </script>
    
    <div class="wrapper">
        <header>
            <div class="Upper">
                <a href="index.html"><img src="./railway_logo.gif.png" alt="Railway Icon" width="80px" height="80px"></a>
                Railreserv-One Stop for All Train Bookings and Browsing
            </div>
            <?php
            include('navbar.php');
            ?>
            <!-- <div class="topnav">
                <a href="index.php">HOME</a>
                <a href="LoginSignup.php">LOGIN</a>
                <div class="dropdownz">
                    <button class="dropbtn">TICKET
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdownz-content">
                        <a class="active" href="book_ticket.php">BOOK TICKET</a>
                        <a href="SearchTicket.php">SEARCH TICKET</a>
                    </div>
                </div>
                <a href="Signup.php">REGISTER</a>
                <a href="faq.php">FAQ</a>
                <a href="contact.php">CONTACT US</a>
            </div> -->
            <h2 style="text-align:center"><br><br><br>Book Your Ticket</h2>
        </header>

            <form method="POST" style="text-align:center">
                <label for="name">Name:</label>
                <input type="text" name="p_name" required><br><br>
                <label for="name">Age:</label>
                <input type="number" name="age" required><br><br>
                <label for="from">From:</label>
                <input type="text" name="from" required><br><br>
                <label for="to">To:</label>
                <input type="text" name="to" required><br><br>
                <label for="date">Date:</label>
                <input type="date" name="date" required><br><br>
                <input type="submit" name="submit">
            </form>

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