<?php
session_start();
unset($_SESSION["Email"]);
unset($_SESSION["Role"]);
unset($_SESSION["ID"]);
unset($_SESSION['contact']);
session_destroy();
header("Location:index.php");
?>