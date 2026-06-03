<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "edustream");

// Get Course ID from URL
if(isset($_GET['id'])) {
    $cid = $_GET['id'];
    $query = "SELECT * FROM courses WHERE courseid = $cid";
    $result = mysqli_query($conn, $query);
    $course = mysqli_fetch_assoc($result);
} else {
    header("Location: courses.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduStream Cinema | <?php echo $course['coursename']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #3498db;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--dark-bg);
            color: white;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* Top Navigation */
        .header {
            background: #111827;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #334155;
        }

        .back-btn {
            color: #94a3b8;
            text-decoration: none;
            transition: 0.3s;
            font-weight: bold;
        }

        .back-btn:hover { color: var(--primary); }

        /* Classroom Layout */
        .classroom-container {
            display: grid;
            grid-template-columns: 1fr 350px;
            height: calc(100vh - 70px);
        }

        /* Video Section */
        .video-area {
            padding: 30px;
            overflow-y: auto;
            background: #000;
        }

        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            border: 1px solid #334155;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .course-info {
            margin-top: 25px;
            padding: 20px;
            background: var(--card-bg);
            border-radius: 12px;
        }

        /* Sidebar Playlist Section */
        .course-sidebar {
            background: #111827;
            border-left: 1px solid #334155;
            padding: 20px;
            overflow-y: auto;
        }

        .lesson-card {
            background: #1e293b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: 0.3s;
            border-left: 4px solid transparent;
        }

        .lesson-card.active {
            border-left-color: var(--primary);
            background: #334155;
        }

        .lesson-card:hover { transform: translateX(5px); background: #334155; }

        .lesson-card i { color: var(--primary); }

    </style>
</head>
<body>

    <div class="header">
        <a href="courses.php" class="back-btn"><i class="fas fa-chevron-left"></i> Leave Classroom</a>
        <div style="text-align: center;">
            <span style="color: var(--primary); font-weight: bold;">NOW PLAYING</span><br>
            <small><?php echo $course['coursename']; ?></small>
        </div>
        <div style="width: 120px;"></div> </div>

    <div class="classroom-container">
        <div class="video-area">
            <div class="video-wrapper">
                <iframe 
                    src="https://www.youtube.com/embed/<?php echo $course['video_link']; ?>?autoplay=1&rel=0" 
                    allowfullscreen>
                </iframe>
            </div>
            
            <div class="course-info">
                <h2 style="margin: 0 0 10px 0;"><?php echo $course['coursename']; ?></h2>
                <p style="color: #94a3b8; line-height: 1.6;">
                    <?php echo $course['description']; ?>
                </p>
                <hr style="border: 0; border-top: 1px solid #334155; margin: 20px 0;">
                <div style="display: flex; gap: 20px; color: #3498db; font-size: 14px;">
                    <span><i class="fas fa-clock"></i> <?php echo $course['total_hours']; ?> Total</span>
                    <span><i class="fas fa-calendar"></i> <?php echo $course['duration_weeks']; ?></span>
                    <span><i class="fas fa-certificate"></i> Certificate Included</span>
                </div>
            </div>
        </div>

        <div class="course-sidebar">
            <h3 style="margin-top: 0;">Course Content</h3>
            
            <div class="lesson-card active">
                <i class="fas fa-play-circle"></i>
                <div>
                    <small style="color: #94a3b8; display: block;">Video 01</small>
                    <strong>Introduction & Basics</strong>
                </div>
            </div>

            <div class="lesson-card">
                <i class="fas fa-lock"></i>
                <div>
                    <small style="color: #64748b; display: block;">Video 02</small>
                    <strong style="color: #64748b;">Advanced Modules</strong>
                </div>
            </div>

            <div class="lesson-card">
                <i class="fas fa-lock"></i>
                <div>
                    <small style="color: #64748b; display: block;">Video 03</small>
                    <strong style="color: #64748b;">Project Implementation</strong>
                </div>
            </div>
            
            <div style="margin-top: 30px; padding: 15px; background: rgba(52, 152, 219, 0.1); border-radius: 8px; border: 1px dashed var(--primary);">
                <p style="font-size: 12px; margin: 0; text-align: center;">Finish this video to unlock the next lesson!</p>
            </div>
        </div>
    </div>

</body>
</html>