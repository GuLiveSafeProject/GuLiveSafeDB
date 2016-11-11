<?php
session_start();
unset($_SESSION['email_id']);
header("Location:index.php");
?> 