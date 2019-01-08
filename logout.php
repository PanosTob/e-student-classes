<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['semester']);
unset($_SESSION['is_teacher']);
header("Location:index.php");
?>