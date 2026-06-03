<?php 
session_start();
if(!isset($_SESSION['user_name'])) { header("Location: login.php"); exit(); }
$student_name = $_SESSION['user_name'];
$date = date("F d, Y");
?>

<!DOCTYPE html>
<html>
<head>
    <title>EduStream | Certificate</title>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background: #555; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .cert-container { 
            width: 800px; 
            height: 550px; 
            background: white; 
            padding: 50px; 
            border: 20px solid #2c3e50; 
            position: relative; 
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }
        .cert-container::before {
            content: ''; position: absolute; top: 10px; left: 10px; right: 10px; bottom: 10px;
            border: 2px solid #3498db;
        }
        h1 { font-family: 'Poppins', sans-serif; font-size: 50px; color: #2c3e50; margin-bottom: 10px; }
        h2 { font-family: 'Pinyon Script', cursive; font-size: 60px; color: #3498db; margin: 20px 0; }
        p { font-family: 'Poppins', sans-serif; font-size: 20px; color: #7f8c8d; }
        .stamp { width: 120px; position: absolute; bottom: 40px; right: 40px; opacity: 0.8; }
        .btn-print { position: fixed; top: 20px; right: 20px; padding: 10px 20px; background: #2ecc71; color: white; border: none; border-radius: 5px; cursor: pointer; }
        @media print { .btn-print { display: none; } body { background: white; } }
    </style>
</head>
<body>

<button class="btn-print" onclick="window.print()">Download as PDF / Print</button>

<div class="cert-container">
    <div style="font-weight:bold; color:#3498db; letter-spacing:5px;">EDUSTREAM ACADEMY</div>
    <h1>CERTIFICATE</h1>
    <p>OF COMPLETION</p>
    <br>
    <p>This is to certify that</p>
    <h2><?php echo $student_name; ?></h2>
    <p>has successfully completed the <b>Full Stack Web Development</b> course</p>
    <p>on this day, <?php echo $date; ?></p>
    
    <div style="margin-top: 50px; border-top: 2px solid #2c3e50; width: 200px; margin-left: auto; margin-right: auto;">
        <p style="font-size: 14px;">Authorized Signature</p>
    </div>
</div>

</body>
</html>