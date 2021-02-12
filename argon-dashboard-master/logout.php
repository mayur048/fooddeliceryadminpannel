<?php
session_start();
unset($_SESSION["Email"]);
unset($_SESSION["Role"]);
header("Location:index.php");
?>