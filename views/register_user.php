<?php

include 'core/init.php';
include 'views/common/header.php';

// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<div class="container">

    <div class="row" style="text-align: center;">
<!-- register form -->
<form method="post" action="register.php" name="registerform" style="margin-top: 4em">
	
	<div class="form-group">
		<!-- the user name input field uses a HTML5 pattern check -->
		<label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
		<input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
	</div>
	<div class="form-group">
		<!-- the email input field uses a HTML5 email type check -->
		<label for="login_input_email">User's email</label>
		<input id="login_input_email" class="login_input" type="email" name="user_email" required />
	</div>
		<div class="form-group">

	<!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_display">Display Name</label>
    <input id="login_input_display" class="login_input" type="text" name="user_display"  />
		</div>

		<div class="form-group">

    <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
		</div>
		<div class="form-group">

    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
			</div>

    <input type="submit"  name="register" class="btn btn-success" value="Register Now" />
	<a href="index.php" class="btn btn-default">Login</a>

</form>
</div>
</div>



<?php include 'views/common/footer.php'?>
