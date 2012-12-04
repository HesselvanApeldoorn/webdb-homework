<?php 
    session_start();
    if  (!isset($_SESSION["user"])) {
        header("location:login.php");
    }
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 604800)) {
    session_unset();
    session_destroy();
}
if(!isset($_SESSION["score"]) | !isset($_SESSION["question"])) {
    $_SESSION["score"] = 0;
    $_SESSION["question"]= 0;
}
$_SESSION['LAST_ACTIVITY'] = time();
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
        echo "<form action='logout.php'>
            <input type='submit' name='logout' value='logout'>
        </form>
        <br><hr>";

        $query = $con->prepare('select count(*) from question');
        $query->execute();
        $numberQuestions = $query->fetchColumn();
        if ($_SESSION["question"]>=$numberQuestions) {
            echo "You've reached the end of this quiz. Thank you for your participation.<br>";
            echo "Your score: ".$_SESSION["score"]." out of ".$numberQuestions; 
            echo "</br><a href=''>Retry</a>";
            $_SESSION["score"] = 0;
            $_SESSION["question"]= 0;
        } elseif (!isset($_REQUEST['submit'])) {
            $query= $con->prepare("select q_text from question where q_number=".($_SESSION['question']+1));
            $query->execute();
            $question = $query->fetch();
            echo $question['q_text'];
            echo "<form method='post'>";
                $sql = "select * from choice where quest_number=".($_SESSION['question']+1);
                $answers = $con->query($sql);
                while($answer = $answers->fetch()) {
                    echo "<input type = 'radio' name = 'ans' value = '".$answer['c_number']."'> ".$answer['c_text']."<br>";
                }
                echo " <input type = 'submit' name = 'submit' value = 'submit'>
            </form>"; 
        } else {
            $sql = "select correct from choice where c_number=".($_POST['ans'])." AND quest_number=".($_SESSION["question"]+1);
            $correct = $con->prepare($sql);
            $correct->execute();
            $correctness = $correct->fetch();
            if (!$correctness) { 
                echo "Invalid answer";
                echo "</br><a href=''>Retry</a>";
            } else {
                if ($correctness['correct']) {
                    $_SESSION ["score"]+= 1;
                    echo "Good job! That's the correct answer";
                } else {
                    echo "No, your answer is wrong.";
                }
                $_SESSION ["question"]+= 1;
                echo "<form method='post'>
                    <input type = 'submit' name = 'Next' value = 'Next'>
                </form>";
            }
        }
        ?>
    </body>
</html>