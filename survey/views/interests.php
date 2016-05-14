<?php

foreach ($interests as $interest) {
	
	echo "<div class='checkbox'>";
	echo "<label>";
	echo "<input type='checkbox' name='interest_" . $interest['id'] . "'  value='" . $interest['id'] . "'><strong>" . $interest['interest'] . "</strong></input>";
	echo "<p>" . $interest['description'] . "</p>";
	echo "</label>";
	echo "</div>";
}


?>


	
