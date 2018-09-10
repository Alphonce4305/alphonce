<?php 
require_once 'core/init.php';
setHeader();
if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'username'=>array('required'=>true),
			'password'=>array('required'=>true)

		));
		if ($validation->passed()) {
			# log user in
			$user = new User();
			$remember = (Input::get('remember') === 'on') ? true : false;
			$login = $user->login(Input::get('username'),Input::get('password') , $remember);

			if ($login) {
				//redirect to profile or index.php
				Redirect::to('index.php');
			}else{?>
			<p class="alert alert-warning" style="width:35%; margin-left: 30%;margin-top: 2%; text-align: center;color: red; font-size: 20px;">
				<?php
				echo "Login Failed Please Try Again ! ";
				?>
			</p>
				<?php
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
 
 
				<form action="" method="POST">
					<div class="form-group"> 
						<label for="username" class="sr-only">Username</label>
						<input type="text" name="username" id="username"  class="form-control" placeholder="Enter Username" autocomplete="off" style="height: 50px;"> 
					</div><br>
					<div class="form-group"> 
						<label for="password" class="sr-only">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" style="height: 50px;"> 
					</div>
					<div class="checkbox" >
						<label for="remember">
						<input type="checkbox" name="remember">
						<small>Remember Me</small>
						</label>
					</div>

						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"><br>
						<input type="submit" name="submit" value="Login" class="btn btn-default">
				</form><br><br>
						<small>Do Not Have Account Please ?
							<a href="register.php" style="text-decoration: none;font-weight: bold;"> &nbsp;&nbsp;CREATE ACCOUNT HERE
							</a>
						</small>
			