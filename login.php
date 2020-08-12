<?php
    session_start();
	
	if(isset($_POST['Submit']))
	{
		$uname = $_POST['userName'];
		$password = $_POST['password'];
		
		if(!empty($uname) && !empty($password) && isset($_POST['remember_me']))
		{
			if(isset($_COOKIE['userName']) && isset($_COOKIE['password']))
			{
				
				if($uname==$_COOKIE['userName'] && md5($password)==$_COOKIE['password'])
				{
					header('location:userdashboard.php');
				}
				else
					echo "Invalid username/password";
			}
		    elseif(!empty($_SESSION['userName']) && !empty($_SESSION['password']))
		    {
				if($uname==$_SESSION['userName'] && $password==$_SESSION['password'])
				{
					setcookie('userName',$_SESSION['userName'],time()+6000,'/');
					setcookie('password',md5($_SESSION['password']),time()+6000,'/');
					setcookie('name',$_SESSION['name'],time()+6000,'/');
					setcookie('email',$_SESSION['email'],time()+6000,'/');
					setcookie('day',$_SESSION['day'],time()+6000,'/');
					setcookie('year',$_SESSION['year'],time()+6000,'/');
					setcookie('month',$_SESSION['month'],time()+6000,'/');
					setcookie('gender',$_SESSION['gender'],time()+6000,'/');
					setcookie('usertype',$_SESSION['usertype'],time()+6000,'/');
					setcookie('status','set',time()+6000,'/');
					session_destroy();
					header('location:userdashboard.php');
				}
				else
				{
					echo "Invalid username/password";
				}
			}
			else
				echo "Invalid username/password";
			
		}
		elseif(!empty($uname) && !empty($password))
	    {
		    if(!empty($_SESSION))
		    {
			    if($_SESSION['userName']==$uname and $_SESSION['password']==$password)
			    {
				    $_SESSION['status'] = 'set';
				    header('location:userdashboard.php');
			    }
				else
				{
					"Invalid username/password";
				}
			}
			else
				echo "Please do your registration first";
		}
		else
			echo "Put your username and password";
	}
	else
	{
		header("location:login.html");
	}
?>