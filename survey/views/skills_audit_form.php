<h1>TTM Skills Audit</h1>

<form method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>" class="form-horizontal">

<h3>Your Details</h3>



<div class="form-group">
	<label for="name" class="col-sm-2 control-label">First Name</label>
	<div class="col-sm-4">
		<input name="firstname" type="text" class="form-control" value='<?php echo $member['firstname'] ?>'></input>
	</div>

	<label for="name" class="col-sm-2 control-label">Last Name</label>
		<div class="col-sm-4">
			<input name="lastname" type="text" class="form-control" value='<?php echo $member['lastname'] ?>'></input>
		</div>
</div>



<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<div class="col-sm-4">
		<input name="email" type="email" class="form-control"  placeholder="me@domain.com" value='<?php echo $member['email'] ?>'></input>
	</div>

	<label for="phone" class="col-sm-2 control-label">Phone Number</label>
	<div class="col-sm-4">
		<input name="phone" type="phone" class="form-control"  value='<?php echo $member['phone'] ?>'></input>
	</div>
</div>


<div class="form-group">
	<label for="address" class="col-sm-2 control-label">Street Address</label>
	<div class="col-sm-10">
		<input name="address" type="text" class="form-control" value='<?php echo $member['address'] ?>'></input>
	</div>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Postcode</label>
	<div class="col-sm-4">
		<input name="postcode" type="text" class="form-control" value='<?php echo $member['postcode'] ?>'></input>
	</div>
	<label for="name" class="col-sm-2 control-label">Suburb</label>
	<div class="col-sm-4">
		<input name="suburb" type="text" class="form-control" value='<?php echo $member['suburb'] ?>'></input>
	</div>
</div>


<div class="form-group">
	
</div>



<div class="row">

<div class="col-md-6">

<h3>My Interests</h3>

<?php include('interests.php'); ?>




</div>
<div class="col-md-6">

<h3>Areas where I'd like to contribute</h3>


<?php include('skills.php'); ?>



</div>

</div> <!-- END Row -->

<h3>Your personal transition story</h3>
<p>We'd love to hear your transition story. Is there something you are particularly passionate about? Have you a special skill or an interest not covered in our list? Have you done something amazing like retrofitting your home or turned your backyard in to a self-sufficient paradise and want to show others? Do you have suggestion or would you like to ask us a question? We'd love to hear from you!</p>

<textarea class="form-control" name="story" rows="6"></textarea>


<h3>Consent</h3>

<p>All information we collect is subject to our privacy policy and relevant Australian Laws. We will not share your information with third-parties unless with your expressed consent.</p>

<p>Since the purpose of this skills audit is ultimately to bring people together so we can collaboratively work towards creating a sustainable and resilient community, we ask that you consent to the following:</p>

<div class="checkbox">
    <label>
      <input type="checkbox" name="consent_contact_by_ttm" value="true" checked> I consent to be contacted by TTM (core group or other members) about my skills and interests.
    </label>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="participation_projects" value="true" checked> I am interested in being contacted about joining or creating TTM projects related to my skills and interests.
    </label>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="participation_share_skills" value="true" checked>I'm interested in being contacted about sharing my skills through participation, workshops and training.
    </label>
  </div>

  <hr>
	<div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>	
  <hr>
<!-- <button type="clear" name="clear" class="btn btn-default">Clear</button> -->
<button type="submit" name="submit" class="btn btn-primary" value="true">Submit</button>

</form>

<!--

Bayswater North	 3153	 Ringwood	 3134
Croydon	 3136	 Ringwood East	 3135
Croydon Hills	 3136	 Ringwood North	 3134
Croydon North	 3136	 Vermont (part)	 3133
Croydon South	 3136	 Warranwood	 3134
Heathmont	 3135	 Wonga Park (part)	 3115
Kilsyth South	 3137	 

 -->
