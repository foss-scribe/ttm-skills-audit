<h1>Become a member of Transition Towns Maroondah!</h1>

<p>Transmission Towns Maroondah (TTM) membership is open to anyone who wishes to be part of our community. Please join us and help make Maroondah a more resilient and sustainable community in face of the growing challenges caused by Climate Change, Peak Oil, rising energy prices and Globalisation.</p>

<p>Members receive TTM updates about events, a monthly newsletter (coming soon!) and more!</p>

<form id="memberForm" method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>">

<h3>Your Details</h3>



<div class="form-group">
	<label for="name" class="col-sm-2 control-label">First Name</label>
	<input name="firstname" type="text" class="form-control" placeholder="Enter your first name" value='' ></input>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Last Name</label>
	<input name="lastname" type="text" class="form-control" placeholder="Enter your last name" value='' ></input>
</div>



<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<input name="email" type="email" class="form-control"  placeholder="me@domain.com" value='' ></input>
</div>

<div class="form-group">
	<label for="phone" class="col-sm-2 control-label">Landline</label>
	<input name="phone" type="phone" class="form-control" placeholder="03 0000 0000"  value=''></input>
</div>

<div class="form-group">
	<label for="mobile" class="col-sm-2 control-label">Mobile</label>
		<input name="mobile" type="mobile" class="form-control" placeholder="0000 000 000"  value=''></input>

</div>


<div class="form-group">
	<label for="address" class="col-sm-2 control-label">Street Address</label>
	<input name="address" type="text" class="form-control" placeholder="1 Some Street" value='' ></input>
</div>

<div class="form-group">
	<label for="suburb" class="col-sm-2 control-label">Suburb/Town</label>
	<input name="suburb" type="text" class="form-control" placeholder="Please enter your Town/Suburb" value='' ></input>
</div>

<div class="form-group">
	<label for="pcode" class="col-sm-2 control-label">Postcode</label>
	<input name="postcode" type="text" minlength="4" maxlength="4" placeholder="31xx" class="form-control" value='' ></input>
</div>
	

<div class="form-group">
	<label for="how" class="control-label">How did you learn about TTM</label>
	<select id="where_learnt" name="where_learnt_about_ttm" class="form-control" >
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
	<div class="form-group">
		<label for="ttm_event" class="control-label">Please enter the TTM event</label>
		<input  type="text" name="ttm_event" class="form-control"></input>
	</div>
	</fieldset>

	<fieldset id="ttmOther">
		<div class="form-group">
			<label for="ttm_other" class="control-label">Please describe:</label>
			<input  type="text" name="ttm_other" class="form-control"></input>
		</div>
	</fieldset>


	<h3>Are you interested participating in a:</h3>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_book_swap">Book Swap?
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_food_swap">Food Swap? 
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_energy_audit">Energy Audit? 
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_kids_clothes_swap">Children's Clothes Swap? 
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="interest_ground_ground">Ground-to-Ground?
		</label>
	</div>
	

<hr>
<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
<hr>
<button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>

</form>

<script>
	$(document).ready(function()
	{
		$.validator.addMethod( "mobileAU", function( phone_number, element ) {
			phone_number = phone_number.replace( /\(|\)|\s+|-/g, "" );
				return this.optional( element ) || phone_number.length > 8 &&
						phone_number.match( /^(?:\(0[0-8]\)|0[0-8])[ ]?[0-9]{4}[ ]?[0-9]{4}$/ );
					}, "Please enter a valid mobile phone number" );

		//toggleTTMEvent();
		$("#where_learnt").change(function () {
			toggleWhereLearnt();
		});
		$("#ttmEvent").hide();
		$("#ttmOther").hide();
		$("#memberForm").validate({
			//debug:true,
			rules: {

				firstname: {
					required: true
				},

				lastname: {
					required: true
				},

				email: {
					required: true,
					email: true
				},
				
				mobile: {
					required: false,
					mobileAU: true
				},

				address: {
					required: true
				},

				postcode: {
					required: true
				},

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
				$("#ttmEvent").prop('disabled', false);
				$("#ttmEvent").show();
				$("#ttmOther").hide();
				$("#ttmOther").prop('disabled', true);
			break;

			case "Other":
				$("#ttmEvent").hide();
				$("#ttmOther").show();
				$("#ttmEvent").prop('disabled', true);
				$("#ttmOther").prop('disabled', false);
			break;

			default: 
				$("#ttmEvent").hide();
				$("#ttmOther").hide();
				$("#ttmOther").prop('disabled', true);
				$("#ttmEvent").prop('disabled', true);
		}
	}
</script>
