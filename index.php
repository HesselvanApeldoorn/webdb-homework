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
	$dsn="mysql://$username:$password@$host/$db";
	$mdb2=mysql_connect($host, $username, $password);
        mysql_select_db($db);
        
// 	if (DB::isError($mdb2))
// 	{
// 	    die($mdb2->getMessage().'  ,  '. $mdb2->getDebugInfo());
// 	} else {
// 	    echo $mdb2;
            if(!isset($_SESSION["score"]) | !isset($_SESSION["question"])) {
                $_SESSION["score"] = 0;
                $_SESSION["question"]= 0;
            }
            $numberQuestions = mysql_result(mysql_query("select count(*) from question"),0);
            //die($mdb2->getMessage().'  ,  '. $mdb2->getDebugInfo());
            if ($_SESSION["question"]>=$numberQuestions) {
                echo "You've reached the end of this quiz. Thank you for your participation.<br>";
                echo "Your score: ".$_SESSION["score"]." out of ".$numberQuestions; 
                session_destroy();
            } elseif (!isset($_REQUEST['submit'])) {
                $question = mysql_query("select q_text from question where q_number=".($_SESSION['question']+1));
                echo mysql_result($question,0)."</br>
                <form method='post'>";
                    $answers = mysql_query("select * from choice where quest_number=".($_SESSION['question']+1));
                    while($answer = mysql_fetch_array($answers)) {
                        echo "<input type = 'radio' name = 'ans' value = '".$answer['c_number']."'> ".$answer['c_text']."<br>";
                    }
                    echo " <input type = 'submit' name = 'submit' value = 'submit'>
                </form>"; 
            } else {
                $correct = mysql_query("select correct from choice where c_number=".($_POST['ans'])." AND quest_number=".($_SESSION["question"]+1));
                $correctness = mysql_result($correct,0);
                $_SESSION ["question"]+= 1;
                if ($correctness) {
                    $_SESSION ["score"]+= 1;
                    echo "Good job! That's the correct answer";
                } else {
                    echo "No, your answer is wrong.";
                }
                echo "<form method='post'>
                    <input type = 'submit' name = 'Next' value = 'Next'>
                </form>";
            }
//         }
        ?>
    </body>
</html>
