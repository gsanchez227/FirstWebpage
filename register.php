<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration Page</title>
		<style type="text/css">
			* {
				box-sizing: border-box;
			}

			body {
				background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(moutain.jpg);
				background-color: beige;
				font-family: sans-serif;
				display: flex;
				align-items: center;
				justify-content: center;
			}

			.formContainer {
				background-color: #fff;
				margin-top: 6%;
				border-radius: 5px;
				box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
				overflow: hidden;
				width: 400px;
				max-width: 100%;
			}

			.formHeader {
				border-bottom: 1px solid #f0f0f1;
				background-color: #f7f7f7;
				padding: 20px 40px;
			}

			.formHeader h2 {
				margin: 0;
				text-align: center;
			}

			.form {
				padding: 30px 40px;	
			}

			.formControl {
				margin-bottom: 10px;
				padding-bottom: 20px;
				position: relative;
			}

			.formControl label {
				display: inline-block;
				margin-bottom: 5px;
			}

			.formControl input {
				border: 2px solid #f0f0f0;
				border-radius: 4px;
				display: block;
				font-family: inherit;
				font-size: 14px;
				padding: 10px;
				width: 100%;
			}


			.formControl input:focus {
				outline: 0;
				border-color: #777;
			}


			.formControl.success input {
				border-color: lightgreen;
			}
			

			.formControl.error input {
				border-color: crimson;
			}

			.form #register {
				background-color: #8e44ad;
				border: 2px solid #8e44ad;
				border-radius: 4px;
				color: #fff;
				display: block;
				font-family: inherit;
				font-size: 16px;
				padding: 10px;
				margin-top: 20px;
				width: 100%;
			}

			.outputDiv.error{
				text-align: center;
				color: red;
			}

			.outputDiv.success{
			text-align: center;
			color: blue;
			}

            .formContainer #registrationError{
                display: block;
                color: red;
                text-align: center;
                margin-bottom: 5%;
            }

            .formContainer #registrationSuccess{
                display: block;
                color: blue;
                text-align: center;
                margin-bottom: 5%;
            }



		</style>
		<script type="text/javascript" >
			var username;
			var password;
			var passwordProgressBar;
			var submit;

			window.addEventListener("load",init);

			function init(){
				  username = document.getElementById("username");
				  password = document.getElementById('password');
				  passwordProgressBar = document.getElementById("progressBar");
				  submit = document.getElementById("submit");
				  
				  submit.addEventListener("click",checkInputs);
			}

			function checkInputs() {
				// trim to remove the whitespaces

				var errors=[];

				//username error check
				if(username.value === '') {
					errors.push("username")
					setErrorFor(username, 'Username cannot be blank');
				} else {
					setSuccessFor(username);
				}

				//password error check
				if(password.value.trim() === '') {
					errors.push("password");
					setErrorFor(password, 'password cannot be blank');
				} else {
					setSuccessFor(password);
				}



			}

			function setErrorFor(input, message) {
				const formControl = input.parentElement;
				const small = formControl.querySelector('small');
				formControl.className = 'formControl error';
				small.innerText = message;
			}

			function setSuccessFor(input) {
				const formControl = input.parentElement;
				formControl.className = 'formControl success';
			}
				

			
		</script>
	</head>
	<body>
		<div class="formContainer">
			<div class="formHeader">
				<h2>Registration Form</h2>
			</div>
			<form class="form" method="post" action="registrationValidation.php">
                <?php               //failed Registration
                                if(@$_GET['registrationError']==true)
                                {
                            ?>
                                <div class="registrationError">
                                    <?php echo '<div id=registrationError>'.$_GET['registrationError'].'</div>' ?>
                                </div>                                
                            <?php
                                }
                                 //Successful Registration

                                else if(@$_GET['registrationSuccess']==true)
                                {
                            ?>
                                <div class="registrationSuccess">
                                    <?php echo '<div id=registrationSuccess>'.$_GET['registrationSuccess'].'</div>' ?>
                                </div>  
                                                              
                            <?php
                                }
                            ?>


				<div class="formControl">
					<label for="username">Username</label>
					<input type="text"  id="username" name="username" required>
				</div>
				<div class="formControl">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<input type="submit" id="register" value="register">
				<div>
					<p>Already have an account?<a href="login.php">Login here</a>.</p>
				</div>
			</form>
		</div>
	</body>
</html>
