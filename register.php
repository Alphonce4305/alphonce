<?php
require_once 'core/init.php';
setHeader();
if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
	
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'username' => array( 
			'required' => true,
			'min' => 2,
			'max' => 20,
			'unique' => 'users'
		),
		'password' => array(
			'required' => true,
			'min' => 6
		),
		'password_again' => array(
			'required' => true,
			'matches' =>'password'
		),
		'name' => array(
			'required' => true,
			'min' => 2,
			'max' => 50
		)
	));

	if ($validation->passed()) {
		//register users

		$user = new User();

		$salt =Hash::salt(32);

		try {
			$user->create(array(

				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'),$salt),
				'salt'=> $salt,
				'name' => Input::get('name'),
				'joined'=> date('Y-m-d H:i:s'),
				'group'=> 1

			));
			 Session::flash('home','You Been Registered Successfully !');//flash alert to users
			 Redirect::to('index.php');
		
		} catch (Exception $e) {
			die($e->getMessage());
		}
		//Session::flash('success','You Been Registered Successfully !');
		
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

<div class="panel panel-primary" style="width:35%; margin-left: 30%;margin-top: 2%; text-align: center;">
 		<div class="panel-heading"> 
 			<h6 align="center">SIGN UP HERE</h6>
 			</div>
 			<div class="panel-body"><br><br>
				<form action="" method="POST"> 
	 				<div class="form-group">
	 					<label for="username" class="sr-only">Username</label>
	 					<input type="text" name="username" id="username" class="form-control" value="<?php echo escape(Input::get('username'));?>" autocomplete="on" placeholder="Enter Username">
	 				</div><br>
	 				<div class="form-group"> 
	 					<label for="password" class="sr-only">Choose Password</label>
	 					<input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
	 				</div><br>
	 				<div class="form-group"> 
	 					<label for="password" class="sr-only">Re-Enter Password</label>
				 		<input type="password" name="password_again" class="form-control" id="password_again" placeholder="Confirm Password">
					</div><br>
					<div class="form-group">
	 					<label for="name" class="sr-only">Name</label>
	 					<input type="text" name="name" id="name"  class="form-control" value="<?php echo escape(Input::get('name'));?>" autocomplete="on" placeholder="Enter Fullname">
	 				</div>
						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"><br>
	 					<input type="submit" name="submit" value="Register" class="btn btn-primary">

				</form><br><br>
						<small>Already Have Account Please ?<a href="login.php" style="text-decoration: none;font-weight: bold;"> &nbsp;&nbsp;LOGIN HERE</a></small>

			</div>
</div>