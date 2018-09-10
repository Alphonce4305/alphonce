<?php 

include_once 'core/init.php';
setHeader();
setNav();
$user = new User();

if (!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required'=>true,
				'min' =>2,
				'max'=>50
			)

		));
		if ($validation->passed()) {
			// update profile
			try {
				$user->update(array(
					'name'=>Input::get('name')
				));
				Session::flash('home','Details Updated Successfully !');//flash alert to users
			 	Redirect::to('index.php');
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}else{?>
			<div class="alert alert-warning" style="width:35%; margin-left: 30%;margin-top: 2%; text-align: center;color: red;">
				<?php
			foreach ($validation ->errors() as $error) {
				echo $error , '<br>';
			}?>
			</div>
			<?php
		}
	}
}
 ?>
<div class="panel panel-default" style="width:35%; margin-left: 30%;margin-top: 2%; text-align: center;">
	
    <div class="panel-heading"><h6>Update Account</h6></div>
    	<div class="panel-body" >
 			<form action="" method="POST">
 				<div class="form-group">
 					<label for="name" >Update Name</label>
 					<input type="text" name="name" class="form-control"  value="<?php echo escape($user->data()->name);?>"><br>

 					<input type="submit" name="submit" value="Update" class="btn btn-default">
 					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
 				</div>
 			</form>
		</div>
</div>
<?php setFooter(); ?>