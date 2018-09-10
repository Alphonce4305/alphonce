
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
<div class="container">

		<!-- Messages section -->
<div class="col-md-4"style="width: 100%;margin-top: 2%;" >
	<div class="panel panel-info">
		<div class="panel-heading"><h5 align="center" style="color: green; font-weight: bold;">PRIVATE OBSA INBOX</h5></div>
			<div class="panel-body">
				<div class="media">
					<div class="media-left">
						<img src="img/avatar.jpg" class="media-object" style="width: 50px;">
							</div><!-- end media-left -->
								<div class="media-body">
									<p>Message from &nbsp;<a href="">Alphonce</a>:<br>
										<small>Good Evening my friend lets meet...</small>
										<a href="#"  style="color: blue;text-decoration: none;"  data-toggle="popover" data-content="And here's some amazing content. It's very engaging. right? " data-placement="auto" data-trigger="focus" title="Message From Alphonce">Read more</a>
									</p>
	
									<p class="btn btn-default btn-xs">
									<a href="#replyform" data-toggle="collapse">Reply</a>
									</p><br>
								<div id="replyform" class="collapse" class="form-group">
							<br>
						<form class="" action="" method="POST">
					<textarea style="min-width: 100%; min-height: 50px;max-width: 100%; max-height: 100px;" class="form-control" max-width="50"></textarea>
				<br>
			<input type="submit" name="reply" value="send" class="btn btn-warning btn-xs" style="float: right;">
		</form>
	</div>
<br>
<div class="raty"></div>
<hr>
</div><!-- end media body -->
</div><!-- end media  -->


<!-- media left -->
<div class="media">
  <div class="media-left">
	<img src="img/avatar.jpg" class="media-object" style="width: 50px;">
	 </div><!-- end media-left -->
	   <div class="media-body">
		<p>Message from &nbsp;<a href="">Evance</a>:<br>
		  <small>Good morning my friend i like your work...</small>
		    <a href="#"  style="color: blue;text-decoration: none;"  data-toggle="popover" data-content="And here's some amazing content. It's very engaging. right? " data-placement="auto" data-trigger="focus" title="Message From Evance">Read more</a></p>
		    	<p class="btn btn-default btn-xs"><a href="#replyform1" data-toggle="collapse">Reply</a></p>
   					<div id="replyform1" class="collapse" ><br>
					<form class="" action="" method="POST">
					<textarea style="min-width: 100%; min-height: 50px;max-width: 100%; max-height: 100px;" class="form-control" max-width="50"></textarea><br>
					<input type="submit" name="reply" value="send" class="btn btn-warning btn-xs" style="float: right;">
					</form>
					</div><br>
				<div class="raty"></div>
		</div><!-- end media body -->
	</div><!-- end media  -->
</div><!-- end panel-body -->
</div><!-- end panel -->
</div>
<!-- end messages section -->


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
