<html>
    <head>
            <?php require_once('../../dbConfig.php'); 
                error_reporting(-1);
                ini_set("display_errors", 1);
                session_start();
            ?>
    </head>
    <body>
        <?php
        $con = new PDO("mysql:dbname=$db;host=$host", $username, $password);
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 604800)) {
                session_unset();
                session_destroy();
            }
            if(!isset($_SESSION["score"]) | !isset($_SESSION["question"])) {
                $_SESSION["score"] = 0;
                $_SESSION["question"]= 0;
            }
            $_SESSION['LAST_ACTIVITY'] = time();
            $query =0;
            $query = $con->prepare('select count(*) from question');
            $query->execute();
            $numberQuestions = $query->fetchColumn();
            if ($_SESSION["question"]>=$numberQuestions) {
                echo "You've reached the end of this quiz. Thank you for your participation.<br>";
                echo "Your score: ".$_SESSION["score"]." out of ".$numberQuestions; 
                echo "</br><a href=''>Retry</a>";
                session_destroy();
            } elseif (!isset($_REQUEST['submit'])) {
                $sql="select q_text from question where q_number=".($_SESSION['question']+1);
                $query = $con->query($sql);
                $question = $query->fetch();
                echo $question['q_text'];
                //echo mysql_result($question,0)."</br>
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
                $correct = $con->query($sql);
                $correctness = $correct->fetch();
                $_SESSION ["question"]+= 1;
                if ($correctness['correct']) {
                    $_SESSION ["score"]+= 1;
                    echo "Good job! That's the correct answer";
                } else {
                    echo "No, your answer is wrong.";
                }
                echo "<form method='post'>
                    <input type = 'submit' name = 'Next' value = 'Next'>
                </form>";
            }
        ?>
    </body>
</html>
