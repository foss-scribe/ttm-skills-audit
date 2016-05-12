<h1>TTM Skills Audit</h1>

<form method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>" class="form-horizontal">

<h3>My Details</h3>


<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
		<input name="name" type="text" class="form-control"></input>
	</div>
</div>



<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email Address</label>
	<div class="col-sm-10">
		<input name="email" type="email" class="form-control"  placeholder="me@domain.com"></input>
	</div>
</div>


<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Street Address</label>
	<div class="col-sm-10">
		<input name="address" type="text" class="form-control"></input>
	</div>
</div>

<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Postcode</label>
	<div class="col-sm-4">
		<input name="postcode" type="text" class="form-control"></input>
	</div>
	<label for="name" class="col-sm-2 control-label">Suburb</label>
	<div class="col-sm-4">
		<input name="suburb" type="text" class="form-control"></input>
	</div>
</div>


<div class="form-group">
	
</div>



<div class="row">

<div class="col-md-6">

<h3>My Interests</h3>

<!-- ENERGY -->

<div class="checkbox">
	<label>
		<input type="checkbox" name="energy" value="true"><strong>Renewable Energy</strong></input>
		<p>Including: building retrofitting, home insulation, thermal imaging, solar, energy saving devices and providers, DIY, renewable energies, batteries</p>
	</label>
</div>
	
<!-- FOOD -->

<div class="checkbox">
	<label>
		<input type="checkbox" name="food_production" value="true"><strong>Food: Security, Production and Transportation</strong></input>
		<p>Including: food security, food production, food miles, home gardens, sharing, localisation, community gardens, composting, permaculture, garden sharing, vegetable growing, cooking, baking, brewing and preserving</p>
	</label>
	
</div>

<!-- TRANSPORT AND CYCLING -->

<div class="checkbox">
	<label>
		<input type="checkbox" name="transport_cycling" value="true"><strong>Transport and Cycling</strong></input>
		<p>Including: Public transport, hybrid and electric vehicles, walking, car pooling, footpath, bicycle maintenance, bicycle paths and parking</p>
	</label>
	
</div>

<!-- HOUSING and PLANNING -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="regulations" value="true"><strong>Housing, planning and building regulations</strong></input>
		<p>Sustainable housing, state and local government regulations for housing, planning, zoning and other community- related construction activities</p>
	</label>
</div>

<!-- THE ARTS -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="arts" value="true"><strong>The Arts</strong></input>
		<p>Including: design, photography, film and documentary making, painting and drawing, music and sculpture</p>
	</label>
	
</div>


<!-- TREES AND PARKS -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="trees_parks" value="true"><strong>Trees and Parks</strong></input>
		<p>Including: conservation, park maintenance, tree planting, Australian natives, natural habitats, pest control, wildlife protection, maintaining Maroondah as a green leafy suburb</p>
	</label>
	
</div>

<!-- WASTE -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="waste" value="true"><strong>Waste Management</strong></input>	
		<p>Including: waste management, composting, coffee grounds collection, plastic bags/bottles, fruit and vegetable waste from shops, hard waste, industrial waste, electronic waste</p>
	</label>
	
</div>

<!-- WATER -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="water" value="true"><strong>Water Management</strong></input>	
		<p>Including: domestic capture and storage, tanks and pump advice, drainage, water quality</p>
	</label>
	
</div>

<!-- RECYCLING -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="recycling" value="true"><strong>Recycling and reuse</strong></input>	
		<p>Including: council collections, sharing, refurbishment, upcycling, eWaste</p>
	</label>
	
</div>


</div>
<div class="col-md-6">

<h3>Areas where I'd like to contribute</h3>

<!-- Communication -->	
<div class="checkbox">
	<label>
		<input type="checkbox" name="communication" value="true"><strong>Communication, marketing and publicity</strong></input>
		<p>Including: writing press releases, case studies, articles, social media, radio and podcasting</p>
	</label>
	
</div>




<!-- PROJECT MANAGEMENT -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="projects_business" value="true"><strong>Project, Business management and administration</strong></input>
		<p>Including: experience developing and managing projects, people, quality, IT related skills, PMBOK</p>
	</label>
	
</div>


<!-- ADMINISTRATION -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="administration" value="true"><strong>Administration and clerical</strong></input>
		<p>Including: Data entry, taking notes/minutes, accounting, facilitating workshops and meetings</p>
	</label>
	
</div>


<!-- GRANTS -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="grants" value="true"><strong>Grant writing</strong></input>
		<p>Including: experience researching, seeking, writing and editing proposals, tenders and grants</p>
	</label>
	
</div>

<!-- Graphic Design -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="graphic_design" value="true"><strong>Graphic Design</strong></input>
		<p>Including: skills in print production, web and email newsletter design (CSS), photo editing, template design, digital illustration</p>
	</label>
	
</div>

<!-- EVENTS -->
<div class="checkbox">
	<label>
		<input type="checkbox" name="events" value="true"><strong>Events management</strong></input>
		<p>Experience in promoting, organising  and managing community or business events and activities</p>
	</label>
</div>

<!-- COMPUTING -->

<div class="checkbox">
	<label>
		<input type="checkbox" name="computing" value="true"><strong>Website and database development</strong></input>
		<p>Including: skills LAMP stack development, Wordpress, database design, Git, testing</p>
	</label>
	
</div>

</div>

</div> <!-- END Row -->

<h3>My transition story</h3>
<p>We'd love to hear your transition story. Is there something you are particularly passionate about? Have you retrofitted your home and want to show others? Have you a special skill or an interested not covered here? Do you have suggestion or would you like to ask us a question? We'd love to hear from you!</p>

<textarea class="form-control" name="story" rows="6"></textarea>


<h3>Consent</h3>

<div class="checkbox">
    <label>
      <input type="checkbox" name="consent_contact_by_ttm" value="true"> I consent to be contacted by TTM (core group or other members) about my skills and interests.
    </label>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="participation_projects" value="true"> I am interested in joining or creating TTM projects related to my skills and interests.
    </label>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="participation_share_skills" value="true">I'm interested in sharing my skills through participation, workshops and training.
    </label>
  </div>

  <hr>
	<div class="g-recaptcha" data-sitekey="6LcNQh4TAAAAAMS_bpAJOvzpdMhj7Bnc_YBWz9MI"></div>	
  <hr>
<button type="clear" name="clear" class="btn btn-default">Clear</button>
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
