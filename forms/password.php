<?php if(isset($_POST['email'])): ?>



<p>Email: <?php echo $_POST['email']; ?><p>
<p>Password: <?php echo md5($_POST['password']); ?></p>

<?php else: ?>

	<p>Basic password creator</p>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email Address</label>
			<div class="col-sm-3">
			<input name="email" type="email" class="form-control"  placeholder="me@domain.com"></input>
			</div>
			<label for="email" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-3">
				<input name="password" type="password" class="form-control"></input>
			</div>
		</div>

<button type="submit" name="go" class="btn btn-primary" value="true">Go</button>


</form>


<?php endif; ?>