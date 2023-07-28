<?php
  session_start();
if(!isset($_SESSION['user'])) 
{
    header('location: login.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="stylenew.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div id="dashboardhome">
        <div class="dashboard-side">
            
           <?php include('side/app-sidebar.php')  ?>
        </div>
        <div class="dascontent">
            <?php include('side/app-topnav.php')  ?>
            <div class="dashboard-content">
                <div class="dashboard-content-main">

                </div>
            </div>
        </div>
    </div>

</body>

</html>
