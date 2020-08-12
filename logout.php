<?php
	session_start();
	session_destroy();

	setcookie('name',$_COOKIE['name'],time()-6000,'/');
	setcookie('email',$_COOKIE['email'],time()-6000,'/');
	setcookie('userName',$_COOKIE['userName'],time()-6000,'/');
	setcookie('password',md5($_COOKIE['password']),time()-6000,'/');
	setcookie('gender',$_COOKIE['gender'],time()-6000,'/');
	setcookie('dob',$_COOKIE['dob'],time()-6000,'/');
	setcookie('usertype',$_COOKIE['usertype'],time()-6000,'/');
	setcookie('status','ok',time()-6000,'/');
	header('location:home.html');
?>