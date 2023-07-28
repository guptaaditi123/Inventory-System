<?php
  session_start();
if(!isset($_SESSION['user'])) 
{
    header('location: login.php');
}

$products = include('database/show-products.php');



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
        <?php include('side/app-sidebar.php')  ?>
        <div class="dascontent">
            <?php include('side/app-topnav.php')  ?>
            <div class="dashboard-content">
                <div class="dashboard-content-main">
                    <div style="display:flex; flex-direction:row; flex-wrap:wrap; width:100%;" class="row">
                        <div style="width:41.67%; " class="column">

                            <div class="dashboard-content-main">
                                <h1 style="border-bottom:1px solid black;" class="hash"><i class="fa fa-plus"></i>Insert
                                    Products</h1>
                                <div id="useraddformcontainer" style=" padding-top: 100px;"></div>

                                <form action="database/addp.php" method="POST" class="appform"
                                    style="background: silver; ">
                                    <div class="appF_container" style=" margin-bottom: 15px;">
                                        <label for="first_name">NAME</label>
                                        <input
                                            style="width: 100%;height: 33px;border: 1px solid gray;border-radius: 5px;"
                                            type="text" class="appForminput" id="name" name="name" />
                                    </div>
                                    <div class="appF_container" style=" margin-bottom: 15px;">
                                        <label for="last_name">PRICE</label>
                                        <input
                                            style="width: 100%;height: 33px;border: 1px solid gray;border-radius: 5px;"
                                            type="text" class="appForminput" id="price" name="price" />
                                    </div>
                                    <div class="appF_container" style=" margin-bottom: 15px;">
                                        <label for="email">QUANTITY</label>
                                        <input
                                            style="width: 100%;height: 33px;border: 1px solid gray;border-radius: 5px;"
                                            type="text" class="appForminput" id="quantity" name="quantity" />
                                    </div>


                                    <button
                                        style=" padding: 10px;border:1px solid white; color:white; background:pink; margin-top:20px; float:right;"
                                        class="shell" type="submit"><i class="fa fa-plus"></i>Add Product</button>

                                </form>
                                <?php
                                if(isset($_SESSION['response']))
                                {
                                $response_message= $_SESSION['response']['message'];
                                $is_success= $_SESSION['response']['success'];
                                ?>
                                <div class="responseMessage">
                                    <p style=" font-size:20px; text-align:center; margin-top:20px; background:#d4a2e0;"
                                        class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                        <?= $response_message ?>
                                    </p>
                                </div>
                                <?php unset($_SESSION['response']); } ?>

                            </div>
                        </div>
                        <div class="column" style="width:58.33%; ">
                            <h1 class="user-list"><i class="fa fa-list"></i>List of Products</h1>
                            <div class="section-content">
                                <div class="users">
                                    <table
                                        style="width: 100%; border-collapse: collapse; border: 1px solid black; font-size: 15px;">
                                        <thead>
                                            <th
                                                style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; ">
                                                S NO.</th>
                                            <th
                                                style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; ">
                                                Name</th>
                                            <th
                                                style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; ">
                                                Price</th>
                                            <th
                                                style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; ">
                                                Quality</th>
                                        </thead>
                                        <tbody>
                                            <?php  
                                            foreach($products as $index => $user){
                                            ?>

                                            <tr>
                                                <td
                                                    style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; text-align:center; text-transform:uppercase;">
                                                    <?= $index + 1 ?></td>
                                                <td
                                                    style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; text-align:center; text-transform:uppercase;">
                                                    <?= $user['name'] ?></td>
                                                <td
                                                    style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; text-align:center;">
                                                    <?= $user['price'] ?></td>
                                                <td
                                                    style=" border-collapse: collapse; border: 1px solid black; font-size: 15px; text-align:center;">
                                                    <?= $user['quantity'] ?></td>




                                            </tr>
                                            <?php   }?>

                                        </tbody>
                                    </table>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

</body>

</html>
