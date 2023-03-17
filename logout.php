<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['auth']);
session_destroy();
header("location:index.php");
