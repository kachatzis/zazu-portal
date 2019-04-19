<?php 

	require_once 'utils/RestrictLogin.php'; 

	$restrict_login_o = new RestrictLogin(); 
	if(isset($restrict_login)&&$restrict_login) { 
		$restrict_login_o->handle(); 
		$restrict_login=true; 
	}else{ 
		$restrict_login=$restrict_login_o->get_logged_in_state(); 
	}


	/* Logged in */
	if ( $restrict_login ) {
		?>
        <p>Redirecting to your Account Page</p>
        <p>If you are not redirected, <a href="/account">Click Here</a></p>
      	<?php
		redirect('/account');
	}

	/* Logged out */
	else {
		?>
        <p>Redirecting to Login Page</p>
        <p>If you are not redirected, <a href="/login">Click Here</a></p>
      	<?php
		redirect('/login');
	}

	//redirect('/login');


?>
