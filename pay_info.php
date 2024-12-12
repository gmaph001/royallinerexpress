<?php

    require "connection.php";

    $billkey = $_GET['bill'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/pay.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Home</title>
</head>
<body>
    <div class="navigation">
        <a href="index.php"><img src="media/icons/logo.png" class="logo"></a>
        <div class="title">
            <p>ROYAL LINER EXPRESS</p>
        </div>
        <div class="horizontal_menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </div>
        <img src="media/icons/menu.png" class="menu_icon">
    </div>
    <div class="body">
        <div class="vertical_menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </div>
        <div class="pay">
            <div class="form">
                <p class="intro">Payment Info</p>
                <p class="exp">
                    Note: The information you input here will help us to contact you later on. Also, the phone number and 
                    the email you will input here will be the one to which all tickets purchased will be sent to!
                </p>
                <?php echo "<form action='verify.php?bill=$billkey' class='pay_form' name='billing' method='POST' enctype='multipart/form-data'>";?>
                    <div class="pay_info">
                        <div class="inputs">
                            <img src="media/icons/user.png" class="icons">
                            <input type="text" name="name" placeholder="Your Name">
                        </div>
                        <p class="alert" id="namealert"></p>
                        <div class="inputs">
                            <img src="media/icons/phone.png" class="icons">
                            <input type="number" name="phone" placeholder="Phone Number">    
                        </div>
                        <p class="alert" id="phonealert"></p>
                        <div class="inputs">
                            <img src="media/icons/mail.png" class="icons">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <p class="alert" id="emailalert"></p>
                    </div>
                    <button class="bill" name="reg_bill" onclick="verify()">Checkout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer_content">
            <div class="footer_logo">
                <a href="index.html"><img src="media/icons/logo.jpeg" class="logo_photo"></a>
            </div>
            <div class="quick">
                <h1>Go to</h1>
                <a href="index.html">Homepage</a>
                <a href="gallery.html">Gallery</a>
                <a href="login.html">Login</a>
            </div>
            <div class="contact">
                <h1>Contact Us</h1>
                <div class="contact_icons">
                    <a href="https://instagram.com/royallinerexpress">
                        <img src="media/icons/instagram.png" class="social_icons">
                    </a>
                    <a href="https://facebook.com/royallinerexpress">
                        <img src="media/icons/facebook.jpg" class="social_icons">
                    </a>
                    <a href="https://x.com/royallinerexpress">
                        <img src="media/icons/x.jpg" class="social_icons">
                    </a>
                    <a href="https://tiktok.com/royallinerexpress">
                        <img src="media/icons/tiktok.png" class="social_icons">
                    </a>
                </div>
                <p>@royallinerexpress</p>
            </div>
            <div class="comments">
                <h1>Comment</h1>
                <form>
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email">
                    <textarea placeholder="Write your comments here..."></textarea>
                    <button class="comment_send">Send</button>
                </form>
            </div>
        </div>
        <p>&copy; Royal Liner Express 2024.</p>
    </div> 
</body>
<script src="js/navBar.js"></script>
<script src="js/pay_info.js"></script>
</html>