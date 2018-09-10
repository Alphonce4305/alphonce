
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

<!-- friends section -->
	<div class="col-md-4" style="width: 100%;margin-top: 2%;">
		<div class="panel panel-info">
			<div class="panel-heading" align="center"><h5 style="color: #000;font-weight: bold;">OBSA MUTUAL FRIENDS</h5>
			</div>
			<div class="panel-body">
				<p>You are an Administrator, Your Friends are Online</p>	
					<ul class="list-group">
						<li class="list-group-item">
							<a href="#" title="Alphonce Odhiambo Is Your Mutual Friend, "data-placement="right" data-toggle="tooltip">
							<img id="avatar" class="img-circle" src="img/avatar.jpg"></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<small>Mutual Friends</small>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<small class="label label-warning">online</small>
							<a href="profile.php?user=alphonce">
								<span class="badge" style="color: green;background: #fff;">Chat <i class="glyphicon glyphicon-comment glyphicon-xl"></i>
								</span>
							</a>
						</li>
						<li class="list-group-item">
							<a href="#" title="Alphonce Odhiambo Is Your Mutual Friend, "data-placement="right" data-toggle="tooltip">
							<img id="avatar" class="img-circle" src="img/avatar.jpg"></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<small>Mutual Friends</small>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<small class="label label-warning">online</small>
							<a href="">
								<span class="badge" style="color: green;background: #fff;">Chat <i class="glyphicon glyphicon-comment glyphicon-xl"></i>
								</span>
							</a>
						</li>
						<li class="list-group-item">
							<a href="#" title="Alphonce Odhiambo Is Your Mutual Friend, "data-placement="right" data-toggle="tooltip">
							<img  id="avatar" class="img-circle" src="img/avatar.jpg"></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<small>Mutual Friends</small>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<small class="label label-warning">online</small>
							<a href="">
								<span class="badge" style="color: green;background: #fff;">Chat <i class="glyphicon glyphicon-comment glyphicon-xl"></i>
								</span>
							</a>
						</li>
					</ul>
	
			</div>
		</div>
	</div><!-- end friends section -->
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
