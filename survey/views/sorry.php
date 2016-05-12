<h1>Sorry</h1>

<p>We're sorry, the skills audit is currently open to registered members of TTM only.</p>

<p>We did not find a record of your email address in our database, however there's a possibility the link we sent to your email did not work correctly. If you are a member, please enter your email address below and click <strong>Go</strong> to try again</p>


<form action="<?php echo $_SERVER[PHP_SELF] ?>" method="get">

<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<div class="col-sm-3">
		<input name="email" type="email" class="form-control"  placeholder="me@domain.com"></input>
	</div>
</div>

<button type="submit" name="go" class="btn btn-primary" value="true">Go</button>


</form>
