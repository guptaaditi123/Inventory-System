<?php
      session_start();
     if(isset($_SESSION['user'])) 
     
        header('location: dashbord.php');
     
    $conn='';
    $error_message = '';
     if($_POST){
    include('database/connection.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM inventorys.users WHERE users.email ="' . $username .'" AND users.password ="'. $password . '"LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute();



    if($stmt->rowCount() > 0)
    {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;
        header('location: dashbord.php');
        var_dump($_SESSION['user']);
         die;

    
           
    }
    else $error_message = 'Please make sure that username and password are correct.';
    var_dump($stmt->rowCount());
    die;
    

  

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="stylenew.css">
</head>

<body id="row">
    <?php
    if(!empty($error_message)){ ?>
    <div id="errormessage" style="background: white; text-align: center; color: red; font-size: 20px; padding: 11px;">
        <p>Error <?= $error_message ?></p>
    </div>
    <?php } ?>
    <div class="form">
        <div class="login-page">
            <h1>IMS</h1>
            <h3>INVENTORY MANAGEMENT SYSTEM</h3>
        </div>

        <div class="forms">
            <form action="login.php" method="POST">
                <div class="loginput">
                    <label for="USERNAME">USERNAME</label>
                    <input type="text" required name="username">
                </div>
                <div class="loginput">
                    <label for="PASSWORD">PASSWORD</label>
                    <input type="password" required name="password">
                </div>
                <div class="buttons">

                    <button>Login</button>
                    <p class="message">Do Not Have Account?<a href="Signup.php" id="linkCreateAccount"> Create
                            Account</a>
                    </p>

                </div>
            </form>

        </div>
    </div>
</body>

</html>
