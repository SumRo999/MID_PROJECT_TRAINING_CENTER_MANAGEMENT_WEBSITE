<?php
    session_start();
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['status']) or $_SESSION['usertype']!="Admin")
		{
			header('location:logout.php');
		}
	}
	else
	{
		if(empty($_COOKIE['status']) or $_COOKIE['usertype']!="Admin")
		{
			header('location:logout.php');
		}
	}
?>

<!DOCKTYPE html>
<title>admimhome</title>
<fieldset>
    <h1>Nexsus Training Center</h1>
	<?php
	    if(!empty($_SESSION))
		{
			echo "<p align='right'> Logged in as <a href='viewprofile.php'>".$_SESSION['userName']."</a>|<a href = 'logout.php'>Logout</a></p>";
		}
		else
			echo "<p align='right'> Logged in as <a href='viewprofile.php'>".$_COOKIE['userName']."</a>|<a href = 'logout.php'>Logout</a></p>";
	?>
</fieldset>
<fieldset>
    <table width="100%" border="">
	    <tr>
		    <td rowspan="8" width="20%">
			    Account<hr/>
				<ul>
				    <li><a href = "admimhome.php">Dashboard</a></li>
					<li><a href = "viewprofile.php">View Profile</a></li>
					<li><a href = "editprofile.php">Edit Profile</a></li>
					<li><a href = "change_password.php">Change Password</a></li>
					<li><a href = "logout.php">Logout</a></li>
				</ul>
			</td>
			<td rowspan="8">
			    <?php
				    if(!empty($_SESSION))
					{
						echo "Welcome ".$_SESSION['name']; 
					}
					else
						echo "Welcome ".$_COOKIE['name'];
				?>
			</td>
		</tr>
	</table>
</fieldset>
<fieldset>
    <h5 align="center">Copyright © 2020</h5>
</fieldset>