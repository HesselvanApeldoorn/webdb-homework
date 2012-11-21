<html>
    <head>
            <?php require_once('../../dbConfig.php'); ?>
    </head>
    <body>
        <?php
            if ($_POST['questionNo']==0) {
                $i=0;
            } else {
                $i=($_POST['questionNo']);
            }
            $numberQuestions = mysql_result(mysql_query("select count(*) from question"),0);
            if ($i>=$numberQuestions) {
                echo "You've reached the end of this quiz. Thank you for your participation.";
            } elseif (!isset($_REQUEST['submit'])) {
                $question = mysql_query("select q_text from question where q_number=($i+1)");
                echo mysql_result($question,0)."</br>
                <form method='post'>";
                    $answers = mysql_query("select * from choice where quest_number=($i+1)");
                    $j=1;
                    while($answer = mysql_fetch_array($answers)) {
                        echo "<input type = 'radio' name = 'ans' value = '".($j)."'> ".$answer['c_text']."<br>";
                        $j++;
                    }
                    echo " <input type = 'submit' name = 'submit' value = 'submit'>
                    <input type = 'hidden' name = 'questionNo' value ='".$i."'>
                </form>"; 
            } else {
                $correct = mysql_query("select correct from choice where c_number=".($_POST['ans'])." AND quest_number=".($i+1));
                $correctness = mysql_result($correct,0);
                if ($correctness) {
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
        ?>
    </body>
</html>
