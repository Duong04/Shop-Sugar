<?php
require('./sql/connect.php');
    $updateQuery = "UPDATE users SET status = 'Đã kích hoạt';";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: login.php");
    }
?>
