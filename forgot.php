<?php
include('header.php');
	if(isset($_POST["submit"]))
	{

	
			
			$sql = "select * from user where email='".$_POST['email']."'";
			
			$query = mysqli_query($con,$sql);
			$data= mysqli_fetch_assoc($query);
			if(mysqli_num_rows($query)>0)
			{
			 $sql_update="update user set password='".$_POST['password']."' where id='".$data['id']."'";
			$query_update = mysqli_query($con,$sql_update);
			if($query_update){
				$msg1="Change password successfully.";
				//header('location:login.php');
				}
					
			}else{
				$msg= 'Email does not exists.';
			}	
	
	}
 
?>
 <!--Header end here--> 
	<div class="wrapper wrapper-form">
		<div class="card card-1">
		<div class="card-heading"></div>
				<div class="card-body">
				<h2 class="title">Fogot Password</h2>
				<?php if($msg){  ?>

				<p style="color:red"><?php echo $msg; ?></p> 

				<?php  }elseif(isset($msg1)){ ?>  <p style="color:green"><?php echo $msg1; ?> </p> <?php } ?>
					<form method="post">
						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="Email" name="email">
						</div>
						<div class="input-group">
						<input type="password" id="txtNewPassword" class="input--style-1" placeholder="PASSWORD"  required/>
						</div>
						<div class="input-group">
							<input type="password" id="txtConfirmPassword" onChange="checkPasswordMatch();" class="input--style-1" name="password"  placeholder="CONFIRM PASSWORD" required/>
						</div>
						<div class="registrationFormAlert" id="divCheckPasswordMatch" style="color:red"></div>
						<div class="p-t-20">
							<button class="btn btn--radius btn--green butt" type="submit" name="submit">Change Password</button>
						</div>
						<a href="login.php">Click here to login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>
<script>
  function checkPasswordMatch() {
    // alert();
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword){
        $("#divCheckPasswordMatch").html("Passwords do not match!");
        $('.butt').prop('disabled',true);
  }else{
      $("#divCheckPasswordMatch").html(" ");
      $('.butt').prop('disabled',false);
  }
}

</script>