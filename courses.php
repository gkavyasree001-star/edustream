<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "edustream");
$result = mysqli_query($conn, "SELECT * FROM courses");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EduStream | Courses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --bg: #f0f2f5; --txt: #2c3e50; --card: white; --side: #2c3e50; --accent: #3498db; }
        [data-theme="dark"] { --bg: #121212; --txt: #ffffff; --card: #1e1e1e; --side: #000000; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); color: var(--txt); margin: 0; display: flex; transition: 0.3s; }
        .sidebar { width: 260px; background: var(--side); height: 100vh; position: fixed; color: white; }
        .nav-item { padding: 15px 25px; display: flex; align-items: center; color: #bdc3c7; text-decoration: none; }
        .nav-item.active { background: #34495e; color: white; }
        .main { margin-left: 260px; padding: 30px; width: 100%; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .card { background: var(--card); border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .info { padding: 15px; }
        .btn { display: block; text-align: center; padding: 10px; border-radius: 5px; text-decoration: none; margin-top: 10px; font-weight: bold; }
    </style>
</head>
<body>
<div class="sidebar">
    <h2 style="text-align:center; color:var(--accent);">EduStream</h2>
    <a href="home.php" class="nav-item"><i class="fas fa-home"></i> Home</a>
    <a href="courses.php" class="nav-item active"><i class="fas fa-book"></i> Courses</a>
</div>
<div class="main">
    <h1>Available Courses</h1>
    <div class="grid">
        <?php while($row = mysqli_fetch_assoc($result)) { 
            $cid = $row['courseid'];
            $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user_progress WHERE course_id = $cid"));
        ?>
        <div class="card">
            <img src="https://img.youtube.com/vi/<?php echo $row['video_link']; ?>/mqdefault.jpg" width="100%">
            <div class="info">
                <h3><?php echo $row['coursename']; ?></h3>
                <?php if($check > 0): ?>
                    <a href="view_course.php?id=<?php echo $cid; ?>" class="btn" style="background:#8e44ad; color:white;">CONTINUE</a>
                <?php else: ?>
                    <a href="start_logic.php?id=<?php echo $cid; ?>" class="btn" style="background:#27ae60; color:white;">START</a>
                <?php endif; ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<script>if(localStorage.getItem('theme') === 'dark') document.documentElement.setAttribute('data-theme', 'dark');</script>
</body>
</html>