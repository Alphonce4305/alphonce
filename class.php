
<?php
require_once 'core/init.php';
setHeader();
if (Session::exists('home')) {
	?>
	<!--  add bootstrap popup alert for success -->
     <p class="alert alert-danger"><?php echo Session::flash('home');?></p>
	<?php 
}

$user = new User();

if ($user->isLoggedIn()) {
	?>
	
         
      

 


	<?php
	if ($user->HasPermission('admin')) {?>

	<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo left">


<div class="chip">
    <img src="img/avatar.jpg" alt="Contact Person">
    <?php echo escape($user->data()->name);?>
 	 </div>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="update.php?user=<?php echo $user->data()->username; ?>">Update Profile</a></li>
        <li><a href="resetpassword.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
            <!-- user dropdown ends -->
	<div class="hidden-lg hidden-xl" style="margin-bottom: 2%;background-color: green;width: 100%;height: 2px;border-radius: 5px;margin-top: 60px;">
	</div>
<div class="container" >
<!-- Class section -->
		<div class="col-md-4"style="width: 100%;margin-top: 2%;" >
			<div class="panel panel-info">
				<div class="panel-heading">
				<h5 align="center" style="color: red;font-weight: bold;">PUBLIC OBSA CLASSROOM</h5>
				</div>
					<div class="panel-body">
						<a style="color: green;" class="btn btn-default btn-lg" href="#ask"data-toggle="collapse"><i class="glyphicon glyphicon-comment"></i> 
							<small>Hi ,<?php echo $user->data()->username; ?> Ask The Class Your Question... 
							</small>
						</a>
			<!-- Start Collapse Area -->
				<div id="ask" class="collapse" class="form-group"><br>
					<form class="" action="" method="POST">
							<textarea style="max-width: 100%; max-height: 150px; min-width: 100%; min-height: 150px;" class="form-control" max-width="50"></textarea><br>
							<input type="submit" name="reply" value="send" class="btn btn-warning btn-xs" style="float: right;">
					</form>
				</div><!-- End Collapse Area -->

	<h5>Trending Questions</h5>
		<ul>
			<li><a href="">Alphonce </a>Asked ?: What is the function of placenta ?</li>
			<li><a href="">Willis </a> Asked ?:What is the function of placenta ?</li>
			<li><a href="">Jared </a> Asked ?:What is the function of placenta ?</li>
		</ul>
	</div>
</div>
</div>
<!-- end class section -->
</div><!-- /end content -->
	<?php
	}
}else{?>
	<div class="well well-lg">
		<?php include_once 'login.php'; ?>
	 <!-- <a href='login.php'>Login</a> or <a href='register.php'> Register</a> -->
	</div>
	<?php
}

setFooter();

?>
