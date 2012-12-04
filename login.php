<?php             
    session_start();
    if  (isset($_SESSION["user"])) {
        header("location:home.php");
    }
?>
<html>
    <head>
        <?php 
            error_reporting(-1);
            ini_set("display_errors", 1);
            require_once('../../dbConfig.php'); 
            try
            {
                $con = new PDO("mysql:dbname=$db;host=$host", $username, $password);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>
    </head>
    <body>

    <div>
        <?php 
         if (isset($_REQUEST['login'])) {
                $username_given = $_REQUEST['username_given'];
                $password_given = hash('sha512', $_REQUEST['password_given']);
                $account = "SELECT COUNT(*) FROM user WHERE user_name='$username_given' AND password='$password_given'";
                $query = $con->prepare($account);
                $query->execute();
                $correct_account = $query->fetchColumn();
                if ($correct_account ==0) {
                    echo "incorrect account credentials.<br> <a href='login.php'>Retry</a>";
                } else {
                    $_SESSION["user"]=$username_given;
                    header("Location: home.php");
                }
        } else {
            echo '
            <form method="post">
                <div class="username">
                    Username: <input type="text" name="username_given" id="username_given">
                </div>
                <div class="password">
                    Password: <input type="password" name="password_given" id="password_given">
                </div>
                <input type="submit" name="login" value="login">
            </form>
            Not a registered user yet?
            <a href="register.php">Register here</a> ';
        }
        ?>

    </div>
    </body>
</html>