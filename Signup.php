<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-page">
        <div class="login-page">
            <h1>IMS</h1>
            <h3>INVENTORY MANAGEMENT SYSTEM</h3>
        </div>
        <div class="forms">

            <form class="signup" action="database/add.php" action="dashbord.php" method="POST">
                <h1 class="see">Create Account</h1>
                <input type="text" placeholder="first_name" required name="first_name">
                <input type="text" placeholder="last_name" required name="last_name">
                <input type="email" placeholder="email" required name="email">
                <input type="password" placeholder="password" required name="password">
                
                <button>Create</button>
                <button>Reset</button>
                <p class="message">Already Have Account?<a href="login.php" id="linkLogin"> Login</a></p>
            </form>
            <?php
                            if(isset($_SESSION['response']))
                            {
                                $response_message= $_SESSION['response']['message'];
                                $is_success= $_SESSION['response']['success'];
                            ?>
                            <div class="responseMessage">
                                <p style=" font-size:20px; text-align:center; margin-top:20px; background:#d4a2e0;"class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                <?= $response_message ?>
                                </p>
                            </div>
                    <?php unset($_SESSION['response']); } ?>


        </div>
    </div>
