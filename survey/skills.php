<?php

foreach ($skills as $skill) {
	
	echo "<div class='checkbox'>";
	echo "<label>";
	echo "<input type='checkbox' name='" . $skill['id'] . "'  value='true'><strong>" . $skill['skill'] . "</strong></input>";
	echo "<p>" . $skill['description'] . "</p>";
	echo "</label>";
	echo "</div>";
}


?>


	
