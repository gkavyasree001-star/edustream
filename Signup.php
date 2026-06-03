<?php include 'db.php'; ?>
<html>
<head>
    <title>EduStream | Join Us</title>
    <style>
        body { margin: 0; font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); width: 350px; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #764ba2; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 16px; transition: 0.3s; }
        button:hover { background: #5a368a; }
        a { color: #764ba2; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Create Account</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button name="reg">Sign Up</button>
        </form>
        <p>Already a member? <a href="login.php">Login here</a></p>
        <?php
        if(isset($_POST['reg'])){
            $u = $_POST['user']; $e = $_POST['email']; $p = $_POST['pass'];
            $sql = "INSERT INTO users (username, email, password) VALUES ('$u', '$e', '$p')";
            if(mysqli_query($conn, $sql)) { header("Location: login.php"); }
        }
        ?>
    </div>
</body>
</html>