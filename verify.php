<?php
require('connection.inc.php');
require('function.inc.php');

if (isset($_GET['token'])) {
    $token = get_safe_value($con, $_GET['token']);
    $query = "SELECT * FROM user WHERE token=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $query = "UPDATE user SET is_verified=1, token=NULL WHERE token=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $token);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Your email has been verified. You can now log in.';
        } else {
            echo 'Verification failed. Please try again later.';
        }
    } else {
        echo 'Invalid token or token has already been used.';
    }
} else {
    echo 'No token provided.';
}
?>
