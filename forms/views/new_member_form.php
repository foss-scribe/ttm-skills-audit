<h1>Become a member of Transition Towns Maroondah!</h1>

<p>Transmission Town Maroondah, TTM, is open to anyone who wishes to be part of our community.</p>

<p>Members receive TTM updates, a monthly newsletter (coming soon!) and more!</p>

<form id="memberForm" method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>" class="form-horizontal">

<h3>Your Details</h3>



<div class="form-group">
	<label for="name" class="col-sm-2 control-label">First Name</label>
	<div class="col-sm-4">
		<input name="firstname" type="text" class="form-control" value='' required></input>
	</div>

	<label for="name" class="col-sm-2 control-label">Last Name</label>
		<div class="col-sm-4">
			<input name="lastname" type="text" class="form-control" value='' required></input>
		</div>
</div>



<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<div class="col-sm-4">
		<input name="email" type="email" class="form-control"  placeholder="me@domain.com" value='' required></input>
	</div>

</div>

<div class="form-group">
	<label for="phone" class="col-sm-2 control-label">Landline</label>
	<div class="col-sm-4">
		<input name="phone" type="phone" class="form-control" placeholder="(03) 0000 0000"  value=''></input>
	</div>

	<label for="mobile" class="col-sm-2 control-label">Mobile</label>
	<div class="col-sm-4">
		<input name="mobile" type="mobile" class="form-control" placeholder="0000 000 000"  value=''></input>
	</div>
</div>



<div class="form-group">
	<label for="address" class="col-sm-2 control-label">Street Address</label>
	<div class="col-sm-4">
		<input name="address" type="text" class="form-control" value='' required></input>
	</div>

	<label for="name" class="col-sm-2 control-label">Suburb</label>
	<div class="col-sm-4">
		<input name="suburb" type="text" class="form-control" value='' required></input>
	</div>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Postcode</label>
	<div class="col-sm-4">
		<input name="postcode" type="text" minlength="4" maxlength="4" class="form-control" value='' required></input>
	</div>
	
</div>

<hr>
<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
<hr>
<button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>

</form>

<script>
	$("#memberForm").validate();
</script>
