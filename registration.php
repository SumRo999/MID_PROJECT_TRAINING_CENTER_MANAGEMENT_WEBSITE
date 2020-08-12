<?php
    session_start();
	if(isset($_POST['Submit']))
	{
		$name = $_POST['name'];
		$uname = $_POST['userName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirmPassword'];
		$gender = $_POST['gender'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		$month = $_POST['month'];
		$usertype = $_POST['usertype'];
		
		if(empty($uname)||empty($password)||empty($email)||empty($confirm_password)||empty($name)||empty($gender)||empty($day)||empty($year)||empty($month)||empty($usertype))
		{
			echo "Null Submission";
		}
		else
		{
			if($name!="" and str_word_count($name)>=2)
			{
				$a=str_split($name);
				if($a['0']=='a' or $a['0']=='b'  or $a['0']=='c' or $a['0']=='d'  or $a['0']=='e' or $a['0']=='f'  or $a['0']=='g' or $a['0']=='h'  or $a['0']=='i' or $a['0']=='j'  or $a['0']=='k' or $a['0']=='l'  or $a['0']=='m' or $a['0']=='n'  or $a['0']=='o' or $a['0']=='p'  or $a['0']=='q' or $a['0']=='r'  or $a['0']=='s' or $a['0']=='t'  or $a['0']=='u' or $a['0']=='v'  or $a['0']=='w' or $a['0']=='x'  or $a['0']=='y' or $a['0']=='z'  or $a['0']=='A' or $a['0']=='B'  or $a['0']=='C' or $a['0']=='D'  or $a['0']=='E' or $a['0']=='F'  or $a['0']=='G' or $a['0']=='H'  or $a['0']=='I' or $a['0']=='J'  or $a['0']=='K' or $a['0']=='L'  or $a['0']=='M' or $a['0']=='N' or $a['0']=='O' or $a['0']=='P'  or $a['0']=='Q' or $a['0']=='R'  or $a['0']=='S' or $a['0']=='T'  or $a['0']=='U' or $a['0']=='V'  or $a['0']=='W' or $a['0']=='X'  or $a['0']=='Y' or $a['0']=='Z')
				{
					for($i=0 ; $i<count($a) ; $i++)
					{
						if($a[$i]=='a' or $a[$i]=='b'  or $a[$i]=='c' or $a[$i]=='d'  or $a[$i]=='e' or $a[$i]=='f'  or $a[$i]=='g' or $a[$i]=='h'  or $a[$i]=='i' or $a[$i]=='j'  or $a[$i]=='k' or $a[$i]=='l'  or $a[$i]=='m' or $a[$i]=='n'  or $a[$i]=='o' or $a[$i]=='p'  or $a[$i]=='q' or $a[$i]=='r'  or $a[$i]=='s' or $a[$i]=='t'  or $a[$i]=='u' or $a[$i]=='v'  or $a[$i]=='w' or $a[$i]=='x'  or $a[$i]=='y' or $a[$i]=='z'  or $a[$i]=='A' or $a[$i]=='B'  or $a[$i]=='C' or $a[$i]=='D'  or $a[$i]=='E' or $a[$i]=='F'  or $a[$i]=='G' or $a[$i]=='H'  or $a[$i]=='I' or $a[$i]=='J'  or $a[$i]=='K' or $a[$i]=='L'  or $a[$i]=='M' or $a[$i]=='N'  or $a[$i]=='O' or $a[$i]=='P'  or $a[$i]=='Q' or $a[$i]=='R'  or $a[$i]=='S' or $a[$i]=='T'  or $a[$i]=='U' or $a[$i]=='V'  or $a[$i]=='W' or $a[$i]=='X'  or $a[$i]=='Y' or $a[$i]=='Z' or $a[$i]=='.' or $a[$i]=='-' or $a[$i]==' ')
						{
							continue;
						}
						else
							echo "Invalid Name";
					}
					if($email!="")
					{
						$count=0;
						$a= str_split($email);
						for($i=0; $i<count($a); $i++)
						{
							if($a[$i]=='@')
							{
								$count++;
							}
							else
								continue;
						}
						if($count==1)
						{
							$at=explode('@', $email);
							$dot=explode('.', $at[1]);
							$extension=0;
							for($i=0; $i<count($dot); $i++)
							{
								$extension=$dot[$i];
							}
							if($extension=="com" or $extension=="edu")
							{
								if($day>='1' and $day<= '31' and $month>='1' and $month<= '12' and $year>='1900' and $year<= '2016'  )
								{
									$conn = mysqli_connect('127.0.0.1', 'root', '', 'training center');
									$result= mysqli_query($conn, "select * from registration where userName='".$uname."';");
									$d1=mysqli_fetch_assoc($result);
									mysqli_close($conn);
									if(empty($d1['userName']))
									{
										if($password == $confirm_password)
										{
							 				$conn = mysqli_connect('127.0.0.1', 'root', '', 'training center');
											$result = mysqli_query($conn, "insert into `registration`(`name`, `email`, `userName`, `password`,`gender`, `dob`,`usertype`) values ('".$name."','".$email."','".$uname."','".$password."','".$gender."','".$day."/".$month."/".$year."','".$usertype."');");
											mysqli_close($conn);
							                header("location:login.html");				
										}
										else
											echo "Password and confirm password not same";
									}
									else
										echo "Username Already exist";
								}
								else
									echo "Invalid DOB";

							}
							else
								echo "Invalid Email";
						}
						else
							echo "Invalid Email";
					}
					else
						echo "Invalid Email";

				}
				else
					echo "Invalid Name";
			}
			else
				echo "Invalid Name";
		}
	}
	else
	{
		header("location:registration.html");
	}
?>