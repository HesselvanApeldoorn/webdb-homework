<html>
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
} elseif (!isset($_REQUEST['submit'])){
    echo $questions[$i][0]."</br>";
    for($j=2; $j<count($questions[$i]);$j++) {
      echo ($j-1)." ".$questions[$i][$j]."</br>";
    }
     
    ?> 
    <form action="<?php echo "${_SERVER['PHP_SELF']}";?>" method="post">
      Answer: <input type="text" name="ans"/>
      <input type = "submit" name = "submit" value = "submit">
      <input type = "hidden" name = "questionNo" value ="<?php echo "$i"; ?>">

    </form>
  
   
    <?php
} else {
	
	if ($_POST['ans']==$questions[$i][1]) {
	  echo "Good job! That's the correct answer";
	} else {
	  echo "No, your answer is wrong.";
	}
	$i++;
	?>
	<form>
	<input type = "submit" name = "Next" value = "Next">
	<input type = "hidden" name = "questionNo" value ="<?php echo "$i"; ?>">
	</form>
	<?php
}
?>
  </body>
</html>
