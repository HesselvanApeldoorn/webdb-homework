<?php             
    session_start();
?>
<html>
    <head>
        <?php 
            //error_reporting(-1);
            //ini_set("display_errors", 1);
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
        <?php 
         if (isset($_REQUEST['submit'])) {
                $username_given = $_REQUEST['username_given'];
                $password_given = $_REQUEST['password_given'];
                $account = "INSERT INTO user VALUES('$username_given', '$password_given')";
                $query = $con->prepare($account);
                $query->execute();
                echo "Inserted account <br>";
                echo "<a href='login.php'> back to login <?a>";
         } else {
                echo ' <h1>MAKE USER HERE</h1>
                <form method="post">
                    <div class="username">
                        Username: <input type="text" name="username_given" id="username_given">
                    </div>
                    <div class="password">
                        Password: <input type="password" name="password_given" id="password_given">
                    </div>
                    <input type="submit" name="submit" value="submit">
                </form> ';

            }?>
    </body>
</html>