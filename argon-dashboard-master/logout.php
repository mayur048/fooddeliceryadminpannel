<?php
session_start();
unset($_SESSION["Email"]);
unset($_SESSION["Role"]);
unset($_SESSION["ID"]);
header("Location:index.php");
?>