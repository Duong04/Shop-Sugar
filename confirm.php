<?php
require('./sql/connect.php');
    // Kiểm tra token và cập nhật trạng thái tài khoản
    $updateQuery = "UPDATE users SET status = 'Đã kích hoạt';";
    if (mysqli_query($conn, $updateQuery)) {
        header("Location: login.php");
}
?>
