<?php
session-start();
unset($_SESSION['user']);
header("Location:index.php");