<?php             
    session_start();
    if  (!isset($_SESSION["user"])) {
        header("location:login.php");
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
        <?php 
            $given_username = $_SESSION["user"];
            echo "<form action='logout.php'>
                <input type='submit' name='logout' value='logout'>
            </form>
            <h3>user: $given_username</h3>
            <br><hr>";
            $query = $con->prepare("select * from high_score where user_name='$given_username' order by score DESC, date_score");
            $query->execute();
            $success = $con->prepare("select avg(score) from high_score where user_name='$given_username'");
            $success->execute();
            $successNumber = $success->fetchColumn();
            echo "Success rate: $successNumber out of 3";
            echo "<h2>Personal attempts</h2>";
            echo "<table border='1'>";
            echo "<th>Score</th>";
            echo "<th>attemptNumber</th>";
            echo "<th>Time</th>";
            foreach($query as $score) {
                echo "<tr>";
                echo "<td>".$score[0]."</td>";
                echo "<td>".$score[2]."</td>";
                echo "<td>".$score[3]."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><hr>";

            $query = $con->prepare("select * from high_score order by score DESC, date_score limit 5");
            $query->execute();
            echo "<h2>All Stars</h2>";
            echo "<table border='1'>";
            echo "<th>Score</th>";
            echo "<th>Name</th>";
            echo "<th>attemptNumber</th>";
            echo "<th>Time</th>";
            foreach($query as $score) {
                echo "<tr>";
                echo "<td>".$score[0]."</td>";
                echo "<td>".$score[1]."</td>";
                echo "<td>".$score[2]."</td>";
                echo "<td>".$score[3]."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br><hr>";
            echo "<a href='index.php'>Start the quiz</a>";
        ?>
    </body>
</html>