<h2>Thank you</h2>

<p>Thank you for taking the time to complete our survey. Your response was successfully received.</p>

<?php if(ENV == "dev"): ?>

<pre>
NOTE: Included for developement purposes only, the following is a representation of the data submited.

<php print_r($_POST); ?>
</pre>

<?php endif; ?>
