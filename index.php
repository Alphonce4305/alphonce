<?php
//SECURE LOGIN
session_start();
require_once("includes/functions/functions.php");

GetClassUser();

$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('welcome.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$upass))
	{
		$login->redirect('welcome');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MIGORI BOYS HIGH SCHOOL</title>
<link href="includes/UX/style/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="includes/UX//style/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link href="includes/UX//style/css/bootstrap-cyborg.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="includes/UX//style/style_index.css" type="text/css"  />
<link rel="stylesheet" href="includes/UX//style/style.css" type="text/css"  />

<link rel="shortcut icon" href="includes/UX/visuals/img/favcon.ico">
</head>
<body>


    
<div class="signin-form">

	<div class="container"> 
    <div class="page-header">
    <img src="includes/UX/visuals/img/school_clear.png" class="img-center" width="120" height="100">
    <br>
    <h2 class="top-heading">MIGORI BOYS HIGH SCHOOL</h2>
    <h5 class="page-header-top">Student Report Management System</h5>
       <form class="form-signin" method="post" id="login-form" style="margin-left: -5%; width:auto; text-align: center;">
       <h5 class="page-header-bottom">Secure Login</h5>
        <h6 class="form-signin-heading">SECURE STAFF LOGIN.</h6>
       
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger" style="color: red;">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-danger">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; LOGIN
            </button>
        </div>  
      </form>
        <p>&copy; Alphonce</p>
    </div>
    </div>
</div>
</div>

</div>
</body>
</html>