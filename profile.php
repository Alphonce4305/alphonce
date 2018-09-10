<?php

require_once 'core/init.php';
setHeader();
if (!$username = Input::get('user')) {
	Redirect::to('index.php');
}else{
	$user = new User($username);
	if (!$user->exists()) {
		Session::flash('home','You Do Not Have Permissions For That Account  !');//flash alert to users
		Redirect::to('index.php');
	}else{
		$user =new User();
		if (!$user->isLoggedIn()) {
		Session::flash('home','You Do Not Have Permissions For That Account  !');//flash alert to users
		Redirect::to('index.php');
		}else{
		$data = $user->data();
		}
	}
	?>
	
	<div class="panel panel-primary" style="width:90%; margin-left: 5%;margin-top: 2%; text-align: center;">
		<div class="panel-heading">
	<div class="chip">
    <img src="img/avatar.jpg" alt="Contact Person">
    <?php echo escape($data->name);?>
 	 </div>
</div>
		<a href="index.php"><i class="glyphicon glyphicon-home glyphicon-lg"></i></a>
	
<p> Hello , <?php echo escape($data->name);?></p>
<ul class="nav nav-tabs">
	<a style="color: green;" class="btn btn-default btn-lg" href="#ask"data-toggle="collapse"><i class="glyphicon glyphicon-comment"></i> 
							<small>Hi ,<?php echo $user->data()->username; ?> Leave A Message ...
							</small>
						</a>
		<!-- Start Collapse Area -->
<div id="ask" class="collapse" class="form-group"><br>
	<div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" class="materialize-textarea" data-length="120" required=""></textarea>
            <label for="textarea2">Message</label>
          </div>
        </div>
        <input type="submit" name="submit" value="send" class="btn btn-warning btn-xs">
      </form>
    </div>
	</div><!-- End Collapse Area -->

</ul>
</div>
</div>
	<?php
}


SetFooter();


?>