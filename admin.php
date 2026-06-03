<?php 
session_start();
include 'db.php';

// In a real project, you'd check if $_SESSION['role'] == 'admin'
// For your demo, we will show the management stats
$student_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$row = mysqli_fetch_assoc($student_count);
?>

<!DOCTYPE html>
<html>
<head>
    <title>EduStream | Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; margin: 0; display: flex; }
        .admin-sidebar { width: 280px; background: #1a252f; color: white; height: 100vh; padding: 30px; position: fixed; }
        .main-admin { margin-left: 280px; padding: 50px; width: 100%; }
        .stat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .stat-card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); text-align: center; }
        .admin-table { width: 100%; background: white; margin-top: 30px; border-collapse: collapse; border-radius: 15px; overflow: hidden; }
        .admin-table th, .admin-table td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        .admin-table th { background: #34495e; color: white; }
        .btn-add { background: #2ecc71; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .btn-delete { background: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="admin-sidebar">
        <h2 style="color:#3498db">Admin Portal</h2>
        <p>System Manager</p>
        <hr style="margin: 20px 0; opacity: 0.2;">
        <nav>
            <p>📊 Dashboard</p>
            <p>📚 Manage Courses</p>
            <p>👥 Student List</p>
            <p>📝 Reports</p>
            <a href="home.php" style="color: #bdc3c7; text-decoration: none;">🏠 Back to Site</a>
        </nav>
    </div>

    <div class="main-admin">
        <h1>Welcome to Control Center</h1>
        <div class="stat-grid">
            <div class="stat-card"><h3>Total Students</h3><div style="font-size: 30px; color: #3498db;"><?php echo $row['total']; ?></div></div>
            <div class="stat-card"><h3>Active Courses</h3><div style="font-size: 30px; color: #2ecc71;">12</div></div>
            <div class="stat-card"><h3>Pending Exams</h3><div style="font-size: 30px; color: #f1c40f;">05</div></div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 40px;">
            <h2>Recent Registered Students</h2>
            <button class="btn-add">+ Add New Course</button>
        </div>

        <table class="admin-table">
            <thead>
                <tr><th>ID</th><th>Username</th><th>Action</th></tr>
            </thead>
            <tbody>
                <?php
                $users = mysqli_query($conn, "SELECT * FROM users LIMIT 5");
                while($u = mysqli_fetch_assoc($users)){
                    echo "<tr>
                            <td>".$u['id']."</td>
                            <td>".$u['username']."</td>
                            <td><a href='#' class='btn-delete'>Delete Student</a></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>