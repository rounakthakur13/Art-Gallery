<?php
ob_start();
session_start();
if($_SESSION['account_type']=='Buyer') {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_mobile']);
	unset($_SESSION['user_address']);
	unset($_SESSION['account_type']);
	unset($_SESSION['item_acquired']);
	header("Location: login.php");
} else {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_mobile']);
	unset($_SESSION['user_address']);
	unset($_SESSION['account_type']);
	header("Location: artistLogin.php");
}
?>