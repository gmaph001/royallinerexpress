<?php
    require "connection.php";
    require "addr.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM admin";
    $result = mysqli_query($db, $query);

    if($result){
        for($i=0; $i<mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result);

            if($row['userkey'] === $id){
                $photo = $row['photo'];
                $rank = $row['rank'];
                $notification = $row['unread'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin_navBar.css">
    <link rel="stylesheet" type="text/css" href="css/expense.css">
    <link rel="icon" type="image/X-icon" href="media/icons/logo.png">
    <title>ROYAL LINER | Administrator | Drivers</title>
</head>
<body>
    <div class="main">
        <div class="sidebar-all">
            <div class="main-cluster">
                <?php echo "<iframe src='sidebar.php?id=$id' class='sidebar'></iframe>";?>
                <img src="media/icons/close.png" class="icons head">
            </div>
        </div>
        <div class="body">
            <div class="navigation">
                <img src="media/icons/menu.png" class="icons menu">
                <h1>ROYAL LINER EXPRESS</h1>
                <div class="horizontal_menu">
                    <?php
                        if($notification == 0){
                            echo 
                                "
                                    <a href='notifications.php?id=$id' class='notification'onmouseover='notifyfunc(1)' onmouseleave='notifyfunc(2)'><img src='media/icons/bell.png' class='icons notify'></a>
                                    <a href='account.php?id=$id'><img src='$photo' class='icons account'></a>
                                    <a href='login.php'><img src='media/icons/logout.png' class='icons'></a>
                                ";
                        }
                        else{
                            echo 
                                "
                                    <a href='notifications.php?id=$id' class='notification'onmouseover='notifyfunc(1)' onmouseleave='notifyfunc(2)'><img src='media/icons/bell.png' class='icons notify'><p>$notification</p></a>
                                    <a href='account.php?id=$id'><img src='$photo' class='icons account'></a>
                                    <a href='login.php'><img src='media/icons/logout.png' class='icons'></a>
                                ";
                        }
                    ?>
                </div>
            </div>
            <div class="content">
                <div class="content-sidebar">
                    <div class="links">
                        <a href="company.html" class="unga current">
                            <img src="media/icons/home-icon.png" class="icons">
                            Overview
                        </a>
                        <a href="company.html" class="unga">
                            <img src="media/icons/income.png" class="icons">
                            Income
                        </a>
                        <a href="company.html" class="unga">
                            <img src="media/icons/expenses.png" class="icons">
                            Expenses
                        </a>
                        <a href="company.html" class="unga">
                            <img src="media/icons/personel.png" class="icons">
                            Personel
                        </a>
                    </div>
                </div>
                <div class="content-body">
                    <?php echo "<form action='subExp.php?id=$id' class='exp-form'>";?>
                        <h1>Fuel Consumption</h1>
                        <center><img src="media/icons/fuel.png" class="exp-icon"></center>

                        <fieldset>
                            <legend>Mafuta</legend>
                            <div class="details">
                                <input type="number" name="fuel" id="mafuta" placeholder="Expenditure">
                            </div> 
                        </fieldset>
                        <button onclick="hakiki2()" name="subFuel" class="submit">Submit Expenditure</button>
                    </form>
                    <?php echo "<form action='subExp.php?id=$id' class='exp-form'>";?>
                        <h1>Garage Expenses</h1>
                        <center><img src="media/icons/garage.png" class="exp-icon"></center>

                        <fieldset>
                            <legend>Gereji</legend>
                            <div class="details">
                                <input type="number" name="garage" id="gereji" placeholder="Expenditure">
                            </div> 
                        </fieldset>
                        <button onclick="hakiki3()" name="subGar" class="submit">Submit Expenditure</button>
                    </form>
                    <?php echo "<form action='subExp.php?id=$id' class='exp-form'>";?>
                        <h1>Other Expenses</h1>
                        <center><img src="media/icons/expenses.png" class="exp-icon"></center>

                        <fieldset>
                            <legend>Matumizi</legend>
                            <div class="details">
                                <input type="text" name="expName" id="expJina" placeholder="Expense Name">
                                <input type="number" name="expense" id="matumizi" placeholder="Expenditure">
                            </div> 
                        </fieldset>
                        <button onclick="hakiki()" name="subExp" class="submit">Submit Expenditure</button>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&COPY; ROYAL LINER EXPRESS 2025</p>
            </div>
        </div>
    </div>    
</body>
<script src="js/admin_navBar.js"></script>
<script>
    function hakiki(){
        if(document.getElementById("expJina").value === ""){
            alert("Tafadhali jaza matumizi!")
            document.getElementById("expJina").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("expJina").style.border = "none";
        }

        if(document.getElementById("matumizi").value === ""){
            alert("Tafadhali jaza kiasi cha matumizi!");
            document.getElementById("matumizi").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("matumizi").style.border = "none";
        }
    }

    function hakiki2(){
        if(document.getElementById("mafuta").value === ""){
            alert("Tafadhali jaza matumizi ya mafuta!");
            document.getElementById("mafuta").style.border = "2px solid red";
            event.preventDefault();
        }
        else{
            document.getElementById("mafuta").style.border = "none";
        }
    }
</script>
</html>