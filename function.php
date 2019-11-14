
<?php 
require_once 'connection.php';
	/**
	 * 
	 */
	class UserLogin
	{
		
		public function login($data)
		{
			$user = mysqli_real_escape_string($connection,$_POST['userid']);
                        
			$pwd = mysqli_real_escape_string($connection, $_POST['password']); 

			$sql = "SELECT id FROM user WHERE email = '$userName' and password = '$password'" ;
			

			if ($sql) {
				session_start();
				$_SESSION['user']= $username;
				header('location:dashboard.php');
			}
		}
		public function logout(){
			unset($_SESSION['user']);
			header('location:index.php');
		}
	}

 ?>