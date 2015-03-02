<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<div class="container">

    <div class="row">

        <div class="row" style="margin-top: 4em">
            <!-- login form box -->
            <form method="post" action="index.php" name="loginform" style="text-align: center">
                <h1> Welcome! Please sign in to continue</h1>
                <br>
                <div class="form-group">
                    <label for="login_input_username">Username</label>
                    <input id="login_input_username" class="login_input" type="text" name="user_name" required/>
                </div>

                <div class="form-group">
                    <label for="login_input_password">Password</label>
                    <input id="login_input_password" class="login_input" type="password" name="user_password"
                           autocomplete="off" required/>
                </div>
                <input type="submit" name="login" class="btn btn-primary" value="Log in"/>
                <a href="register.php" class="btn btn-success">Register new account</a>

            </form>
        </div>
        <!-- /container -->
    </div>
</div>

