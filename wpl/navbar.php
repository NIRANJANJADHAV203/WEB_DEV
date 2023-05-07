<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
          if (!isset($_SESSION['user'])) {
            echo '
            <div class="topnav">
            <a href="index.php">HOME</a>
            <a href="LoginSignup.php">LOGIN</a>
            <div class="dropdownz">
            </div>
            <a href="Signup.php">REGISTER</a>
            <a href="faq.php">FAQ</a>
            <a href="contact.php">CONTACT US</a>
        </div>
            ';
          }else{
            echo '
            <div class="topnav">
            <a href="index.php">HOME</a>
            <div class="dropdownz">
                <button class="dropbtn">TICKET
                </button>
                <div class="dropdownz-content">
                    <a href="book_ticket.php">BOOK TICKET</a>
                    <a href="SearchTicket.php">SEARCH TICKET</a>
                </div>
            </div>
            <a href="faq.php">FAQ</a>
            <a href="contact.php">CONTACT US</a>
        </div>
            ';
          }

        ?>
    
</body>
</html>