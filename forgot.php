<?php include 'db.php'; ?>
<html>
<body style="font-family: Arial; text-align: center; padding-top: 50px; background-color: #f4f4f4;">
    <div style="background: white; display: inline-block; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2>Reset Your Password</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Enter Username" required style="width: 250px; padding: 10px; margin: 10px 0;"><br>
            <input type="password" name="new_pass" placeholder="Enter New Password" required style="width: 250px; padding: 10px; margin: 10px 0;"><br>
            <button name="reset" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Update Password</button>
        </form>

        <?php
        if(isset($_POST['reset'])){
            $u = $_POST['user'];
            $np = $_POST['new_pass'];
            
            // This command UPDATES the password in your 'users' table
            $sql = "UPDATE users SET password='$np' WHERE username='$u'";
            
            if(mysqli_query($conn, $sql)) {
                echo "<p style='color: green;'>Password updated! Jumping to Login...</p>";
                header("refresh:2; url=login.php"); // Wait 2 seconds then jump to login
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
        <br><a href="login.php" style="text-decoration: none; color: #007bff;">Back to Login</a>
    </div>
</body>
</html>