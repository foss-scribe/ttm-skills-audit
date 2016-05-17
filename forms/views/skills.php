<?php

foreach ($skills as $skill) {
	
	echo "<div class='checkbox'>";
	echo "<label>";
	echo "<input type='checkbox' name='skill_" . $skill['id'] . "'  value='" . $skill['id'] . "'><strong>" . $skill['skill'] . "</strong></input>";
	echo "<p>" . $skill['description'] . "</p>";
	echo "</label>";
	echo "</div>";
}


?>


	
