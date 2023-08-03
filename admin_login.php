<?php 
	session_start();
	include 'header.php';
	if(isset($_SESSION['user_data'])){
		header("location: http://localhost/MyDailyBlog/admin/index.php");
	}
?>

	<div class="container">
		<div class="row justify-content-center mx-1 mx-md-0">
			<div class="col-12 col-xl-4 col-md-6 p-5 mt-5 bg-secondary rounded">
				<p class="text-center text-white">Blog! Login your account.</p>
				<form action="" method="POST">
					<div class="mb-3">
						<input type="email" name="email" placeholder="Email" class="form-control" required>
					</div>
					<div class="mb-3">
						<input type="password" name="password" placeholder="Password" class="form-control" required>
					</div>
					<div class="mb-3">
						<input type="submit" name="login_btn" value="Login" class="btn btn-primary">
					</div>
					<?php
						if(isset($_SESSION['error'])){
							echo '<span class="bg-danger p-2 text-white">'.$_SESSION['error'].'</span>';
							unset( $_SESSION['error']);
						}
					?>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php';

	if (isset($_POST['login_btn'])) {
		$email = mysqli_real_escape_string($config, $_POST['email']);
		$pass = mysqli_real_escape_string($config, sha1($_POST['password']));

		$sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

        $query = mysqli_query($config,$sql);
		$data = mysqli_num_rows($query);
        if ($data) {
			$result = mysqli_fetch_assoc($query);
			$user_data = array($result['user_id'],$result['username'],$result['role']);
			$_SESSION['user_data'] = $user_data;
			header("location:admin/index.php");
		}else{
			$_SESSION['error'] = "Invalid email/password";
			header("location:admin_login.php");
		}
	}
	










?>