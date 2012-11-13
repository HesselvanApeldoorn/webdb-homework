<html>
  <body>
    <?php
      if (!isset($_REQUEST['submit'])){
    ?>
      How does a duck know what direction south is? </br>
      a: He doesn't</br>
      b: Magnetic field</br>
      c: Sonar</br>
      d: GPS</br>
      e: Another wrong answer</br>
    
    <form action="<?php echo "${_SERVER['PHP_SELF']}";?>" method="post">
      Answer: <input type="text" name="name"/> <br>
      <input type = "submit" name = "submit" value = "submit">
    </form>
  
   
    <?php
      } else {
	if("${_REQUEST['name']}"=="a") {
	  echo "They do know what direction south is actually";
	} else if("${_REQUEST['name']}"=="b") {
          echo "Yep, magnetic field.";?> <a href="http://www.youtube.com/watch?v=IZdyXjPjbHQ"> And how does he tell his wife from all the other ducks? </a> <?php
        } else if("${_REQUEST['name']}"=="c") {
	  echo "Ducks are not bats";
	} else if("${_REQUEST['name']}"=="d") {
	  echo "Ducks don't have GPS!";
	} else if("${_REQUEST['name']}"=="e") {
	  echo "Hint: the answer is not 'e'";
	} else {
	  echo "Only enter the correct letter please.";
	}
      }
    ?>
  </body>
</html>