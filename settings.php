<?php session_start(); include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>EduStream | Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: #f4f7f6; display: flex; }
        .sidebar { width: 260px; background: #2c3e50; color: white; padding: 30px 20px; position: fixed; height: 100%; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 15px; margin-bottom: 10px; border-radius: 10px; display: block; }
        .sidebar a.active { background: #34495e; color: white; border-left: 5px solid #3498db; }
        
        .main-content { margin-left: 260px; width: calc(100% - 260px); padding: 60px; }
        .settings-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .setting-item { display: flex; justify-content: space-between; align-items: center; padding: 20px 0; border-bottom: 1px solid #eee; }
        .toggle { width: 50px; height: 25px; background: #2ecc71; border-radius: 15px; position: relative; cursor: pointer; }
        .toggle::after { content: ''; width: 21px; height: 21px; background: white; border-radius: 50%; position: absolute; top: 2px; right: 2px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="color:#3498db; text-align:center; margin-bottom:40px;">EduStream</h2>
        <a href="home.php">🏠 Dashboard</a>
        <a href="courses.php">📚 My Courses</a>
        <a href="profile.php">👤 Student Profile</a>
        <a href="settings.php" class="active">⚙️ Settings</a>
    </div>

    <div class="main-content">
        <div class="settings-box">
            <h1>Account Settings</h1>
            <div class="setting-item">
                <div><strong>Email Notifications</strong><p style="color:#7f8c8d; font-size:12px;">Get alerts for new courses</p></div>
                <div class="toggle"></div>
            </div>
            <div class="setting-item">
                <div><strong>Dark Mode</strong><p style="color:#7f8c8d; font-size:12px;">Change the website theme</p></div>
                <div class="toggle" style="background:#ddd;"></div>
            </div>
            <div class="setting-item">
                <div><strong>Public Profile</strong><p style="color:#7f8c8d; font-size:12px;">Allow other students to see your progress</p></div>
                <div class="toggle"></div>
            </div>
            <br>
            <button style="padding: 10px 20px; background:#3498db; color:white; border:none; border-radius:5px; cursor:pointer;">Save Changes</button>
        </div>
    </div>
</body>
</html>