<?php
 ob_start();
include('header.php');

 
	if(isset($_POST["submit"]))
	{
			$sql = "select * from user where email='".$_POST['email']."' and password = '".$_POST['password']."' ";
			
			$query = mysqli_query($con,$sql);
			
			if(mysqli_num_rows($query)>0)
			{
				while($arr = mysqli_fetch_assoc($query))
				{
					//echo '<script>window.location.href = "myaccount.php";</script>';
					$_SESSION["name"]=$arr;

					if(isset($_SESSION['act_url1'])){
						echo '<script>window.location.href = "single.php?'.$_SESSION['act_url'].'";</script>';
					}else{
						echo '<script>window.location.href = "myaccount.php";</script>';
					}
				}
			}else{
				$msg= "Wrong Username or Password.";

			}
		
	}


?>
 <!--Header end here--> 
	<div class="wrapper wrapper-form">
		<div class="card card-1">
		<div class="card-heading"></div>
				<div class="card-body">
				<h2 class="title">Login</h2>
				<?php if(isset($msg)){ ?>

				<p style="color:red"><?php echo $msg; ?></p> 

				<?php  } ?>
					<form method="post">
						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="Email" name="email">
						</div>
						<div class="input-group">
							<input class="input--style-1" type="password" placeholder="Password" name="password">
						</div>
						<p id="forgotPass"><a href="forgot.php">Forgot Password?</a></p>
						<div class="p-t-20">
							<button class="btn btn--radius btn--green" type="submit" name="submit">Login</button>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>