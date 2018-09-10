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
		$validation = $validate->check($_POST ,array(

			'password_current' => array(
				'required' => true,
				'min'=>6
			),
			'password_new' => array(
				'required' => true,
				'min'=>6,
				
			),
			'password_new_again' => array(
				'required' => true,
				'min'=>6,
				'matches'=>'password_new'
			)
		));
	if ($validation->passed()) {
		//Check Password
	if (Hash::make(Input::get('password_current'),$user->data()->salt) !== $user->data()->password) {
			echo "You've Entered Wrong Password !";
		}else{
			// update password
			$salt = Hash::salt(32);
			$user->update(array(
				'password'=>Hash::make(Input::get('password_new'),$salt),
				'salt'=>$salt
			));
			Session::flash('home','New Password Has Been Set Successfully !');//flash alert to users
			Redirect::to('index.php');
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
<div class="panel panel-warning" style="width:35%; margin-left: 30%;margin-top: 2%; text-align: center;">
	
<div class="panel-heading"><h6>Reset Password</h6></div>
<div class="panel-body" >
<form action="" method="POST">
	<div class="form-group">
 		<label for="password_current" class="sr-only">Curent Password</label>
 		<input type="password" name="password_current" id=" password_current" class="form-control" placeholder="Enter Old Password">
 	</div>
 	<br>
	<div class="form-group">
 		<label for="password_new" class="sr-only">New Password</label>
 		<input type="password" name="password_new" id="password_new" class="form-control" placeholder="Enter New Password">
 	</div>
 	<br>
 	<div class="form-group" >
 		<label for="password_new_again" class="sr-only">Confirm New Password</label>
 		<input type="password" name="password_new_again" id="password_new_again" class="form-control" placeholder="Re-Enter New Password">	
 	</div>
 	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
 	<input type="submit" name="submit" value="Change Password" class="btn btn-warning">
 </form>
 </div>
 </div>
 <?php setFooter(); ?>