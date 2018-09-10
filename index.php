
<?php
require_once 'core/init.php';
setHeader();

?>
   <?php $user = new User(); if ($user->isLoggedIn()){?>
   
            <?php setNav(); ?>
	
<div class="container" style="width: 100%; margin-top: 2%; margin-left: 0%;" >
<!-- Messages section -->
		<div class="col-md-4"style="width: 100%; margin-left: 0%;" >
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
<!-- end messages section -->

		
</div><!-- /end content -->
	<?php
   } else{?>
<div class="row" >
 	<div class="col-sm-4">
		<div class="panel panel-primary">
 		<div class="panel-heading"> 
 			<h6 align="center">LOGIN HERE</h6>
 			</div>
 			<div class="panel-body"><br><br>
		<?php include_once 'login.php'; ?>
	 <!-- <a href='login.php'>Login</a> or <a href='register.php'> Register</a> -->
			</div>
		</div>
	</div>
	
</div>
	<?php
}

setFooter();

?>
