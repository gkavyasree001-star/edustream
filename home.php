<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "edustream");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EduStream | Premium Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { 
            --bg: #f0f2f5; 
            --txt: #2c3e50; 
            --card: white; 
            --side: #2c3e50; 
            --accent: #3498db; 
        }

        [data-theme="dark"] { 
            --bg: #121212; 
            --txt: #ffffff; 
            --card: #1e1e1e; 
            --side: #000000; 
        }

        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: var(--bg); 
            color: var(--txt); 
            margin: 0; 
            display: flex; 
            transition: 0.3s ease;
        }
        
        /* Sidebar Fix - Perfect Alignment */
        .sidebar { 
            width: 260px; 
            background: var(--side); 
            height: 100vh; 
            position: fixed; 
            color: white; 
            z-index: 100;
        }

        .sidebar h2 { 
            text-align: center; 
            color: var(--accent); 
            font-size: 28px; 
            padding: 20px 0; 
            margin: 0;
            border-bottom: 1px solid #34495e; 
        }

        .nav-item { 
            padding: 15px 25px; 
            display: flex; 
            align-items: center; 
            color: #bdc3c7; 
            text-decoration: none; 
            border: none; 
            background: none; 
            width: 100%; 
            cursor: pointer; 
            font-size: 16px; 
            transition: 0.2s;
        }

        .nav-item:hover, .nav-item.active { 
            background: #34495e; 
            color: white; 
        }

        .nav-item i { margin-right: 15px; width: 20px; }

        /* Main Content Alignment */
        .main-content { 
            margin-left: 260px; 
            width: calc(100% - 260px); 
            padding: 30px; 
            box-sizing: border-box; 
        }

        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px; 
            margin-bottom: 30px; 
        }

        .stat-card { 
            background: var(--card); 
            padding: 20px; 
            border-radius: 12px; 
            text-align: center; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
            cursor: pointer; 
        }

        /* Bubble Animation */
        .stat-card:hover { 
            transform: scale(1.08); 
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.2); 
        }

        .stat-card h3 { margin: 0; font-size: 30px; color: var(--accent); }
        .stat-card p { margin: 5px 0 0; font-size: 12px; color: #7f8c8d; font-weight: bold; }

        .hero-section { 
            background: linear-gradient(135deg, #4b0082, #3498db); 
            border-radius: 20px; 
            padding: 40px; 
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            box-shadow: 0 10px 30px rgba(75, 0, 130, 0.3);
        }

        .btn-main { 
            background: white; 
            color: #3498db; 
            padding: 12px 25px; 
            border-radius: 30px; 
            text-decoration: none; 
            font-weight: bold; 
            display: inline-block; 
            margin-top: 15px; 
            border: none; 
            cursor: pointer; 
            transition: 0.3s;
        }

        .btn-main:hover { transform: translateY(-3px); }

        /* Modals */
        .modal { 
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.8); 
            align-items: center; 
            justify-content: center; 
        }

        .modal-content { 
            background: var(--card); 
            padding: 30px; 
            border-radius: 15px; 
            width: 550px; 
            position: relative; 
            color: var(--txt); 
        }

        .profile-table { width: 100%; border-collapse: collapse; margin-top: 20px; text-align: left; }
        .profile-table td { padding: 12px; border-bottom: 1px solid #eee; }
        .status-pill { background: #27ae60; color: white; padding: 4px 10px; border-radius: 20px; font-size: 12px; }

        .logout-box { position: absolute; bottom: 20px; width: 100%; padding: 0 15px; box-sizing: border-box; }
        .logout-btn { 
            background: #e74c3c; 
            border-radius: 8px; 
            color: white !important; 
            text-align: center; 
            justify-content: center; 
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>EduStream</h2>
    <a href="home.php" class="nav-item active"><i class="fas fa-home"></i> Dashboard Home</a>
    <a href="courses.php" class="nav-item"><i class="fas fa-book"></i> My Courses</a>
    <button onclick="showModal('profileModal')" class="nav-item"><i class="fas fa-id-card"></i> Student Profile</button>
    <button onclick="showModal('settingsModal')" class="nav-item"><i class="fas fa-user-cog"></i> Settings</button>
    <div class="logout-box">
        <a href="logout.php" class="nav-item logout-btn">Logout Session</a>
    </div>
</div>

<div class="main-content">
    <div class="stats-grid">
        <div class="stat-card"><h3>12</h3><p>ENROLLED</p></div>
        <div class="stat-card"><h3>08</h3><p>COMPLETED</p></div>
        <div class="stat-card"><h3>1,250</h3><p>POINTS</p></div>
        <div class="stat-card"><h3>#12</h3><p>RANK</p></div>
    </div>

    <div class="hero-section">
        <div>
            <h1>Ready to Learn,<br>Kavyasree?</h1>
            <button onclick="window.location.href='courses.php'" class="btn-main">BROWSE 12 COURSES</button>
        </div>
        <img src="https://illustrations.popsy.co/white/studying.svg" width="220" alt="Student Illustration">
    </div>

    <div style="display:flex; gap:20px; margin-top:25px;">
        <button onclick="showModal('certModal')" class="stat-card" style="flex:1;"><i class="fas fa-medal" style="color:#f1c40f"></i><p>CLAIM CERTIFICATE</p></button>
        <button onclick="window.location.href='courses.php'" class="stat-card" style="flex:1;"><i class="fas fa-search"></i><p>FIND COURSES</p></button>
    </div>
</div>

<div id="profileModal" class="modal">
    <div class="modal-content">
        <span onclick="closeModal('profileModal')" style="float:right; cursor:pointer;">&times;</span>
        <h2 style="border-bottom: 2px solid var(--accent); padding-bottom:10px;">Student Account Details</h2>
        <table class="profile-table">
            <tr><td><strong>Student Name</strong></td><td>Kavyasree G</td></tr>
            <tr><td><strong>Registration ID</strong></td><td>EDUS-2026-BCA</td></tr>
            <tr><td><strong>Academic Year</strong></td><td>Final Year BCA (2023-2026)</td></tr>
            <tr><td><strong>Institution</strong></td><td>CMS College of Science & Commerce</td></tr>
            <tr><td><strong>Account Status</strong></td><td><span class="status-pill">Active User</span></td></tr>
        </table>
    </div>
</div>

<div id="settingsModal" class="modal">
    <div class="modal-content">
        <span onclick="closeModal('settingsModal')" style="float:right; cursor:pointer;">&times;</span>
        <h2>System Settings</h2>
        <button onclick="setTheme('light')" class="btn-main" style="background:#ddd; color:#000;">Light Mode</button>
        <button onclick="setTheme('dark')" class="btn-main" style="background:#222; color:#fff;">Dark Mode</button>
        <hr>
        <p><input type="checkbox" checked> Desktop Notifications</p>
    </div>
</div>

<div id="certModal" class="modal">
    <div class="modal-content" style="width: 600px; text-align: center;">
        <span onclick="closeModal('certModal')" style="float:right; cursor:pointer;">&times;</span>
        <div style="border: 10px double var(--accent); padding: 30px; background: white; color: black;">
            <h1 style="font-family: serif;">CERTIFICATE</h1>
            <p>This certifies that</p>
            <h2 style="color: var(--accent);">KAVYASREE G</h2>
            <p>has completed the EduStream Learning Program</p>
        </div>
    </div>
</div>

<script>
    function showModal(id) { document.getElementById(id).style.display = 'flex'; }
    function closeModal(id) { document.getElementById(id).style.display = 'none'; }
    function setTheme(t) { 
        document.documentElement.setAttribute('data-theme', t); 
        localStorage.setItem('theme', t); 
    }
    if(localStorage.getItem('theme') === 'dark') setTheme('dark');
</script>
</body>
</html>