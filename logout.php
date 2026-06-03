<?php
session_start();
session_unset(); // Removes all saved user data
session_destroy(); // Destroys the session
header("Location: login.php"); // Jumps back to login
exit();
?>