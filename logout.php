<?php
	session_start(); 

	// if the user is logged in, unset the session 
	if (isset($_SESSION['Login'])) //check current user session, then unset the session
	{ 
		unset($_SESSION['Login']); 
	} 
	session_destroy(); //destroy the session

	header('Location: visitorPage.html');
	exit; 
?> 