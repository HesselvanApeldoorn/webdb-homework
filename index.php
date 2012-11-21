<html>
    <head>
            <?php require_once('../../dbConfig.php'); ?>
    </head>
    <body>
        <?php
            if(!isset($_COOKIE["cookie"])) {
                setcookie("cookie[score]", 0);
                setcookie("cookie[question]", 0);
                echo "crap<br>";
            }
            if ($_POST['questionNo']==0) {
                $i=0;
                setcookie("cookie[score]", 0);
                setcookie("cookie[question]", 0);
            } else {
                $i=($_POST['questionNo']);
            }
            if($_COOKIE["cookie"]["question"]!=$i) {
                echo "<h1>You are not at the correct question (we aren't cheating now, are we?). Please redo the entire quiz.</h1>";
                echo "<a href=''>Retry</a>";
            } else {
                $numberQuestions = mysql_result(mysql_query("select count(*) from question"),0);
                if ($i>=$numberQuestions) {
                    echo "You've reached the end of this quiz. Thank you for your participation.<br>";
                    echo "Your score: ".$_COOKIE["cookie"]["score"]." out of ".$numberQuestions; 
                    setcookie("cookie[score]", 0);
                    setcookie("cookie[question]", 0);
                } elseif (!isset($_REQUEST['submit'])) {
                    $question = mysql_query("select q_text from question where q_number=($i+1)");
                    echo mysql_result($question,0)."</br>
                    <form method='post'>";
                        $answers = mysql_query("select * from choice where quest_number=($i+1)");
                        while($answer = mysql_fetch_array($answers)) {
                            echo "<input type = 'radio' name = 'ans' value = '".$answer['c_number']."'> ".$answer['c_text']."<br>";
                        }
                        echo " <input type = 'submit' name = 'submit' value = 'submit'>
                        <input type = 'hidden' name = 'questionNo' value ='".$i."'>
                    </form>"; 
                } else {
                    $correct = mysql_query("select correct from choice where c_number=".($_POST['ans'])." AND quest_number=".($i+1));
                    $correctness = mysql_result($correct,0);
                    setcookie("cookie[question]",$_COOKIE["cookie"]["question"]+1);
                    if ($correctness) {
                        setcookie("cookie[score]",$_COOKIE["cookie"]["score"]+1);
                        echo "Good job! That's the correct answer";
                    } else {
                        echo "No, your answer is wrong.";
                    }
                    $i++;
                    echo "<form method='post'>
                        <input type = 'submit' name = 'Next' value = 'Next'>
                        <input type = 'hidden' name = 'questionNo' value ='".$i."'>
                    </form>";
                }
            }
        ?>
    </body>
</html>
