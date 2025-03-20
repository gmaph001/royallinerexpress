<?php
    require "connection.php";

    $photos = [];
    $size = 0;

    $query = "SELECT * FROM photos";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            $photos[$size] = $row['photo_name'];
            $size++;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Gallery</title>
</head>
<body>
    <div class="navigation">
        <a href="index.php"><img src="media/icons/logo.png" class="logo"></a>
        <div class="title">
            <p>ROYAL LINER EXPRESS</p>
        </div>
        <div class="horizontal_menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <img src="media/icons/menu.png" class="menu_icon">
    </div>
    <div class="body">
        <div class="vertical_menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="images">
                <?php
                    for($i=$size-1; $i>=0; $i--){
                        echo 
                            "
                                <a href='$photos[$i]' target='_blank'><img src='$photos[$i]' class='photo'></a>
                            ";
                    }
                ?>                
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
                <form action="review.php" name="review" method="POST">
                    <input type="text" name="name" id="jina" placeholder="Name">
                    <p class="attent" id="nameattent"></p>
                    <input type="email" name="email" id="pepe" placeholder="Email">
                    <p class="attent" id="emailattent"></p>
                    <textarea name="commentation" id="ujumbe" placeholder="Write your comments here..."></textarea>
                    <p class="attent" id="commentattent"></p>
                    <button name="rev_send" class="comment_send" onclick="comment()">Send</button>
                </form>
            </div>
        </div>
        <p class="last">&copy; Royal Liner Express 2024.</p>
    </div> 
</body>
<script src="js/navBar.js"></script>
<script src="js/home.js"></script>
<script src="js/review.js"></script>
</html>