<h1>Update your details</h1>


<form id="memberForm" method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>" class="form">

<h3>Personal details</h3>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">First Name</label>
	<input name="firstname" type="text" class="form-control" value='<?php echo $member['firstname'] ?>'>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Last Name</label>
	<input name="lastname" type="text" class="form-control" value='<?php echo $member['lastname'] ?>'>
</div>

<div class="form-group">
	<label for="gender" class="col-sm-2 control-label">Last Name</label>
	<select>
		<option>Female</option>
		<option>Male</option>
		<option>Trans</option>
		<option>Prefer not to say</option>
	</select>
</div>

<div class="form-group">
	<label for="dob" class="col-sm-2 control-label">Year you were born</label>
	<input name="dob" type="text" class="form-control" placeholder="YYYY" value='<?php echo $member['dob'] ?>'>
</div>

<div class="form-group">
	<label for="household_income" class="col-sm-2 control-label">Household income</label>
	<select>
		<option>Less than 50,000</option>
		<option>50,001 to 80,000</option>
		<option>80,001 to 110,000</option>
		<option>Above 110,000</option>
		<option>Prefer not to say</option>
	</select>
</div>


<h3>Contact</h3>

<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<input name="email" type="email" class="form-control"  placeholder="me@domain.com" value='<?php echo $member['email'] ?>' required></input>
</div>

<div class="form-group">
	<label for="phone" class="col-sm-2 control-label">Landline</label>
	<input name="phone" type="phone" class="form-control" placeholder="(03) 0000 0000"  value='<?php echo $member['phone'] ?>'></input>
</div>

<div class="form-group">
	<label for="mobile" class="col-sm-2 control-label">Mobile</label>
	<input name="mobile" type="mobile" class="form-control" placeholder="0000 000 000"  value='<?php echo $member['mobile'] ?>'></input>
</div>



<div class="form-group">
	<label for="address" class="col-sm-2 control-label">Street Address</label>
	<input name="address" type="text" class="form-control" placeholder="1 your street" value='<?php echo $member['address'] ?>'></input>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Suburb</label>
	<input id="suburb" name="suburb" type="text" class="form-control" value='<?php echo $member['suburb'] ?>'></input>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Postcode</label>
	<input name="postcode" type="text" class="form-control" placeholder="3000" value='<?php echo $member['postcode'] ?>'></input>	
</div>

<h3>Social</h3>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Website or blog</label>
	<input name="social_web" type="text" class="form-control" value='<?php echo $member['website'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Twitter</label>
	<input name="social_twitter" type="text" class="form-control" placeholder="@twitterID" value='<?php echo $member['twitter'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Facebook</label>
	<input name="social_facebook" type="text" class="form-control" value='<?php echo $member['facebook'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Google+</label>
	<input name="social_googleplus" type="text" class="form-control" value='<?php echo $member['googleplus'] ?>'></input>	
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Instagram</label>
	<input name="social_instagram" type="text" class="form-control" value='<?php echo $member['instagram'] ?>'></input>	
</div>


  <hr>
	<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>	
  <hr>
<!-- <button type="clear" name="clear" class="btn btn-default">Clear</button> -->
<input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
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

			
			$("#memberForm").validate({
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

			},	
		});
		});	
</script>
<script>
	var options = {
	data: ["Bayswater North", "Croydon", "Croydon Hills", "Croydon North", "Croydon South", "Heathmont", "Kilsyth South", "Ringwood", "Ringwood East", "Ringwood North", "Vermont", "Warranwood", "Wonga Park"],
	list: {
		maxNumberOfElements: 13,
		match:
		{
			enabled: true
		}
	}
};

$("#suburb").easyAutocomplete(options);
</script>

<!--

Bayswater North	 3153	 Ringwood	 3134
Croydon	 3136	 Ringwood East	 3135
Croydon Hills	 3136	 Ringwood North	 3134
Croydon North	 3136	 Vermont (part)	 3133
Croydon South	 3136	 Warranwood	 3134
Heathmont	 3135	 Wonga Park (part)	 3115
Kilsyth South	 3137	 

 -->
