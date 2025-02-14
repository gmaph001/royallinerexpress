<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_navBar.css">
    <link rel="stylesheet" type="text/css" href="css/notification.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Home</title>
</head>
<body>
    <div class="main">
        <div class="sidebar-all">
            <div class="main-cluster">
                <iframe src="sidebar.html" class="sidebar"></iframe>
                <img src="media/icons/close.png" class="icons head">
            </div>
        </div>
        <div class="body">
            <div class="navigation">
                <img src="media/icons/menu.png" class="icons menu">
                <h1>ROYAL LINER EXPRESS</h1>
                <img src="media/icons/logo.png" class="logo">
                <div class="horizontal_menu">
                    <a href="notifications.html" class="notification" onmouseover="notifyfunc(1)" onmouseleave="notifyfunc(2)"><img src="media/icons/bell.png" class="icons notify"><p>1</p></a>
                    <a href="account.html"><img src="media/images/profiles/IMG_20180819_121655.jpg" class="icons account"></a>
                    <a href="login.html"><img src="media/icons/logout.png" class="icons"></a>
                </div>
            </div>
            <div class="content">
                <div class="notify-sidebar">
                    <div class="title">
                        <h1>Notification</h1>
                    </div>
                    <div class="notify-sidebar-body">
                        <a class="notify-sidebar-header" href="notification.html">Ticket Mails</a>
                        <a class="notify-sidebar-header">Agent Mails</a>
                        <a class="notify-sidebar-header">Main Ag. Mails</a>
                        <a class="notify-sidebar-header">CEO Mails</a>
                    </div>
                </div>
                <div class="notify-content">
                    <div class="message-body">
                        <div class="msg-title">
                            <h1>Ticket Confirmation</h1>
                        </div>
                        <div class="msg-body">
                            <p>Passenger No: <b>324567453</b> named: <b>GEORGE MAPHOLE</b> wants confirmation 
                                for ticket payment of <b>Tshs. 40,000/=</b>.
                            </p>
                        </div>
                        <a href="approve.php" class="approve">Confirmed</a>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>
</body>
<script src="js/admin_navBar.js"></script>
</html>