<?php session_start(); include 'db.php'; ?>
<html>
<head>
    <title>EduStream | Login</title>
    <style>
        body { margin: 0; font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #3498db 0%, #8e44ad 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); width: 350px; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #3498db; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; }
        a { color: #3498db; text-decoration: none; font-size: 13px; display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Welcome Back</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button name="login">Login</button>
        </form>
        <a href="forgot.php">Forgot Password?</a>
        <a href="Signup.php">Create an account</a>
        <?php
        if(isset($_POST['login'])){
            $u = $_POST['user']; $p = $_POST['pass'];
            $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p'");
            if(mysqli_num_rows($result) > 0) {
                $_SESSION['user_name'] = $u;
                header("Location: home.php");
            } else { echo "<p style='color:red;'>Invalid Login!</p>"; }
        }
        ?>
    </div>
</body>
</html>