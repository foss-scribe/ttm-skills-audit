<h1>TTM Skills Audit</h1>

<p>Welcome to the TTM skills and interests audit. This initiative is designed to give Transition Towns Maroondah (TTM) insight into the interests that matter to you and the skills that you have to share with the community.</p>


<div class="alert alert-info" role="alert">
<p>Note that by completing and submitting this skills audit, you give consent to be contacted by TTM about projects and initiatives related to your nominated skills and interests.</p>

<p>All information we collect is subject to our privacy policy and relevant Australian Laws and is intended for TTM purposes only. We will not share your information with third-parties unless with your expressed consent.</p>
</div>

<form method="post" action="<?php echo $_SERVER[PHP_SELF] ;?>" class="form-horizontal">


<div class="row">

<div class="col-md-6">

<h3>Your Interests</h3>

<?php include('interests.php'); ?>




</div>
<div class="col-md-6">

<h3>Areas where you'd like to contribute</h3>


<?php include('skills.php'); ?>



</div>

</div> <!-- END Row -->

<h3>Your personal transition story</h3>
<p>We'd love to hear your transition story. Is there something you are particularly passionate about? Have you a special skill or an interest not covered in our list? Have you done something amazing like retrofitting your home or turned your backyard in to a self-sufficient paradise and want to show others? Do you have suggestion or would you like to ask us a question? We'd love to hear from you!</p>

<textarea class="form-control" name="story" rows="6"></textarea>



<!-- <button type="clear" name="clear" class="btn btn-default">Clear</button> -->
<input type="hidden" name="member_id" value="<?php echo $member['id']; ?>">
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
