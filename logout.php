<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['semester']);
unset($_SESSION['is_teacher']);
unset($_SESSION['have_chosen_teaching_lessons']);
header("Location:index.php");
?>