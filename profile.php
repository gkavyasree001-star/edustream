<?php 
session_start();
include 'db.php';

if(!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user_name'];
// Fetch user details from database
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>EduStream | Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: #f4f7f6; display: flex; }
        .sidebar { width: 260px; background: #2c3e50; color: white; padding: 30px 20px; position: fixed; height: 100%; }
        .sidebar h2 { color: #3498db; margin-bottom: 40px; text-align: center; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 15px; margin-bottom: 10px; border-radius: 10px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: white; border-left: 5px solid #3498db; }
        
        .main-content { margin-left: 260px; width: calc(100% - 260px); padding: 60px; display: flex; justify-content: center; }
        .profile-card { background: white; width: 500px; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); text-align: center; }
        .avatar { width: 120px; height: 120px; background: #3498db; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 50px; font-weight: bold; }
        .info-row { text-align: left; margin-top: 20px; padding: 10px; border-bottom: 1px solid #eee; }
        .label { color: #7f8c8d; font-size: 13px; font-weight: bold; }
        .value { color: #2c3e50; font-size: 18px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>EduStream</h2>
        <a href="home.php">🏠 Dashboard</a>
        <a href="courses.php">📚</a>
        <a href="profile.php" class="active">👤 Student Profile</a>
        <a href="settings.php">⚙️ Settings</a>
        <a href="logout.php" style="margin-top:100px; background:#e74c3c; color:white; text-align:center;">Logout</a>
    </div>

    <div class="main-content">
        <div class="profile-card">
            <div class="avatar"><?php echo substr($user, 0, 1); ?></div>
            <h2>Student Profile</h2>
            <div class="info-row">
                <p class="label">Full Name</p>
                <p class="value"><?php echo $data['username']; ?></p>
            </div>
            <div class="info-row">
                <p class="label">Email Address</p>
                <p class="value"><?php echo isset($data['email']) ? $data['email'] : 'Not Provided'; ?></p>
            </div>
            <div class="info-row">
                <p class="label">Account Status</p>
                <p class="value" style="color: #2ecc71;">Active Student</p>
            </div>
        </div>
    </div>
</body>
</html>