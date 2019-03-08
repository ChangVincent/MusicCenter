<?php

if(isset($_POST['loginButton'])) {
	// login botton pressed
	$username = sanitizeFormUsername($_POST['loginUsername']);
	$password = sanitizeFormPassword($_POST['loginPassword']);

	$loginSuccessful = $account->login($username, $password);

	if($loginSuccessful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}

?>