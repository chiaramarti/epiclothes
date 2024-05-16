<?php
session_start();

// Destroy the user session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
