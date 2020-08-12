<?php
    session_start();
	if(!empty($_SESSION))
	{
		if(empty($_SESSION['status']) or $_SESSION['usertype']!="Trainer")
		{
			header('location:logout.php');
		}
	}
	else
	{
		if(empty($_COOKIE['status']) or $_COOKIE['usertype']!="Trainer")
		{
			header('location:logout.php');
		}
	}
?>

<!DOCKTYPE html>
<title>trainerhome</title>
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
			   <h1>Nayeem Hasan will do this part</h1>
			</td>
		</tr>
	</table>
</fieldset>
<fieldset>
    <h5 align="center">Copyright © 2020</h5>
</fieldset>