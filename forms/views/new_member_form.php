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

	<label for="suburb" class="col-sm-2 control-label">Suburb</label>
	<div class="col-sm-4">
		<input name="suburb" type="text" class="form-control" value='' required></input>
	</div>
</div>

<div class="form-group">
	<label for="pcode" class="col-sm-2 control-label">Postcode</label>
	<div class="col-sm-4">
		<input name="postcode" type="text" minlength="4" maxlength="4" class="form-control" value='' required></input>
	</div>
	
</div>

<div class="form-group">
	<label for="how" class="col-sm-2 control-label">How did you learn about TTM</label>
	<div class="col-sm-4">
		<select id="where_learnt" name="where_learnt_about_ttm" class="form-control" required>
			<option value="">Select an option</option>
			<option value="TTM Event">TTM Event</option>
			<option value="TTM Website">TTM Website</option>
			<option value="TTM Facebook Page">TTM Facebook Page</option>
			<option value="Web search">Web search</option>
			<option value="Word-of-mouth">Word-of-mouth</option>
			<option value="Other">Other...</option>
		</select>
	</div>

	<fieldset id="ttmEvent">
		<label for="ttm_event" class="col-sm-4 control-label">TTM Event:</label>
		<div class="col-sm-8">
			<input  type="text" name="ttm_event" class="form-control"></input>
		</div>
	</fieldset>
	<fieldset id="ttmOther">
		<label for="ttm_event" class="col-sm-4 control-label">Other:</label>
		<div class="col-sm-8">
			<input  type="text" name="ttm_other" class="form-control"></input>
		</div>
	</fieldset>
</div>

<div class="form-group">
	<h3>Are you interested participating in a:</h3>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_book_swap">Book Swap?
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="intererst_food_swap">Food Swap? 
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_energy_audit">Energy Audit? 
		</label>
	</div>
	
</div>

<hr>
<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
<hr>
<button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>

</form>

<script>
	$(document).ready(function()
	{
		//toggleTTMEvent();
		$("#where_learnt").change(function () {
			toggleWhereLearnt();
		});
		$("#ttmEvent").hide();
		$("#ttmOther").hide();
		$("#memberForm").validate({
			debug:true,
			rules: {
				ttm_event: {
					required: function () {
						if ($("#where_learnt[value='TTM Event']")) {
							return true;
						} else {
							return false;
						}
					}
				},
				ttm_other: {
					required: function () {
						if ($("#where_learnt[value='Other']")) {
							return true;
						} else {
							return false;
						}
					}
				},
			},	
		});	
	});
	function toggleWhereLearnt()
	{
		
		switch($("#where_learnt").val()){

			case "TTM Event":
				$("#ttmEvent").show();
				$("#ttmOther").hide();
			break;

			case "Other":
				$("#ttmEvent").hide();
				$("#ttmOther").show();
			break;

			default: 
				$("#ttmEvent").hide();
				$("#ttmOther").hide();
		}
	}

</script>
