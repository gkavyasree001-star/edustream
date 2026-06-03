<?php
$conn = mysqli_connect("localhost", "root", "", "edustream");
$cid = $_GET['id'];
$uid = 1;

// Only insert if it doesn't already exist
$check = mysqli_query($conn, "SELECT * FROM user_progress WHERE user_id = $uid AND course_id = $cid");
if(mysqli_num_rows($check) == 0) {
    mysqli_query($conn, "INSERT INTO user_progress (user_id, course_id) VALUES ($uid, $cid)");
}

header("Location: view_course.php?id=".$cid);
exit();
?>