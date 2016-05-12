<?php

foreach ($interests as $interest) {
	
	echo "<div class='checkbox'>";
	echo "<label>";
	echo "<input type='checkbox' name='" . $interest['id'] . "'  value='true'><strong>" . $interest['interest'] . "</strong></input>";
	echo "<p>" . $interest['description'] . "</p>";
	echo "</label>";
	echo "</div>";
}


?>


	
