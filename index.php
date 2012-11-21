<html>
    <head>
            <?php require_once('../../dbConfig.php'); ?>
    </head>
    <body>
        <?php
            $questions = array( 
                array("How does a duck know what direction south is?", 2, "He doesn't", "Magnetic field", "Sonar", "GPS"),
                array("How does he tell his wife from all the other ducks?", 1, "wedding ring", "He doesn't", "Feathers", "GPS"),
            );
            if ($_REQUEST['questionNo']==0) {
                $i=0;
            } else {
                $i=($_REQUEST['questionNo']);
            }
            if ($i>=count($questions)) {
                echo "You've reached the end of this quiz. Thank you for your participation.";
            } elseif (!isset($_REQUEST['submit'])) {
                echo $questions[$i][0]."</br>
                <form method='post'>";
                    for($j=2; $j<count($questions[$i]); $j++) {
                        echo "<input type = 'radio' name = 'ans' value = '".($j-1)."'> ";
                        echo $questions[$i][$j]."</br>";
                    }
                    echo " <input type = 'submit' name = 'submit' value = 'submit'>
                    <input type = 'hidden' name = 'questionNo' value ='".$i."'>
                </form>"; 
            } else {
                if ($_POST['ans']==$questions[$i][1]) {
                    echo "Good job! That's the correct answer";
                } else {
                    echo "No, your answer is wrong.";
                }
                $i++;
                echo "<form>
                    <input type = 'submit' name = 'Next' value = 'Next'>
                    <input type = 'hidden' name = 'questionNo' value ='".$i."'>
                </form>";
            }
        ?>
    </body>
</html>
