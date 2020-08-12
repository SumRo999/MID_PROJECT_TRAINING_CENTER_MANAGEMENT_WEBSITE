<?php
    session_start();
	
	if(isset($_POST['Submit']))
	{
		$uname = $_POST['userName'];
		$password = $_POST['password'];
		
		if(!empty($uname) && !empty($password))
		{
			if(isset($_COOKIE['userName']) && isset($_COOKIE['password']))
			{
				echo "Null Submission";
			}
		    else
		    {
				$conn = mysqli_connect('127.0.0.1', 'root', '', 'training center');
			    $result= mysqli_query($connection, "select * from registration where userName='".$uname."' and password = '".$password."';");
			    $d1=mysqli_fetch_assoc($result);
			    mysqli_close($conn);
				if(!empty($d1))
				{
					if(isset($_POST['remember_me']))
					{
						setcookie('name',$d1['name'],time()+6000,'/');
						setcookie('email',$d1['email'],time()+6000,'/');
						setcookie('userName',$d1['userName'],time()+6000,'/');
					    setcookie('password',md5($d1['password']),time()+6000,'/');
					    setcookie('gender',$d1['gender'],time()+6000,'/');
					    setcookie('dob',$d1['dob'],time()+6000,'/');
						setcookie('usertype',$d1['usertype'],time()+6000,'/');
						setcookie('status','ok',time()+6000,'/');
						if ($_COOKIE['usertype']=="Admin") 
						{
							header('location:adminhome.php');
						}
						elseif ($_COOKIE['usertype']=="Student") 
						{
							header('location:studenthome.php');
						}
						else
							header('location:trainerhome.php');

					}
					else
					{
						$_SESSION['name']= $d1['name'];
						$_SESSION['email'] = $d1['email'];
						$_SESSION['userName']= $d1['userName'];
						$_SESSION['password']= $d1['password'];
						$_SESSION['gender']= $d1['Gender'];
						$_SESSION['dob'] = $d1['dob'];
						$_SESSION['usertype'] = $d1['usertype'];
						$_SESSION['status']  = "set";
						if ($_COOKIE['usertype']=="Admin") 
						{
							header('location:adminhome.php');
						}
						elseif ($_COOKIE['usertype']=="Student") 
						{
							header('location:studenthome.php');
						}
						else
							header('location:trainerhome.php');
					}
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