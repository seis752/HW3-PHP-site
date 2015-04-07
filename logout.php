<?php
	session_start();
	unset($_SESSION['user']);
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";;