<?php
include('header.php');
 
if(isset($_POST["submit"]))
	{
			
		$sql = "insert into user (firstname,lastname,email,password)values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['password']."')";
		$query = mysqli_query($con,$sql);
				
			if($query){
				//echo 'record succesfully';
				?>
					
						<script>window.location.href = "login.php";</script>
					<?php
			}	
		
	}



?> 
 <!--Header end here--> 
	<div class="wrapper wrapper-form">
		<div class="card card-1">
			<div class="card-heading"></div>
				<div class="card-body">
				<h2 class="title">Sign Up</h2>

				<form method="post">
					<div class="input-group">
						<input class="input--style-1" type="text" placeholder="FIRST NAME" name="firstname" required>
					</div>
					<div class="input-group">
						<input class="input--style-1" type="text" placeholder="LAST NAME" name="lastname" required>
					</div>
					<div class="input-group">
						<input class="input--style-1" type="text" placeholder="E-MAIL" name="email" required>
					</div>
					<div class="input-group">
						<input type="password" id="txtNewPassword" class="input--style-1" placeholder="PASSWORD"  required/>
					</div>
					<div class="input-group">
						 
						<input type="password" id="txtConfirmPassword" onChange="checkPasswordMatch();" class="input--style-1" name="password"  placeholder="CONFIRM PASSWORD" required/>

					</div>
					<div class="registrationFormAlert" id="divCheckPasswordMatch" style="color:red"></div>


					<div class="p-t-20">
						<button type="submit" class="btn btn-primary butt" name="submit">Register</button>
        			<a href="login.php">Click here to login</a>
					</div>
				</form>
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