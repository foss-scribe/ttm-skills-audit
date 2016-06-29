<h1>Password reset</h1>

<p>Enter your email below to reset your password.</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>" class="form-horizontal">

<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<div class="col-sm-4">
		<input name="email" type="email" class="form-control"  placeholder="me@domain.com" value=''></input>
	</div>

</div>

<hr>
<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
<hr>
<button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>

</form>
