<?php

    $id = $_GET['id'];

?>
<script>
    function logoutUser() {
        sessionStorage.clear();
        localStorage.clear();

        document.cookie.split(";").forEach(cookie => {
            document.cookie = cookie.replace(/^ +/, "").replace(/=.*/, "=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/");9
        });

        history.pushState(null, null, location.href);
        history.replaceState(null, null, "login.html");
        window.onpopstate = function () {
            history.go(1);
        };
            
        alert("You have been logged out due to inactivity!");
        window.location.href = "<?php echo "logout.php?id=$id";?>";
    } 

    setTimeout(logoutUser, 1800000);
</script>