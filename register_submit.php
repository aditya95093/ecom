<?php
require ('connection.inc.php');
require ('function.inc.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';

require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$mobile = get_safe_value($con, $_POST['mobile']);
$password = get_safe_value($con, $_POST['password']);
$added_on = date('Y-m-d h:i:s');
$token = bin2hex(random_bytes(50));

// Check if the email already exists
$query = "SELECT * FROM user WHERE email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "email_present";
} else {
    // Insert new user
    $query_insert = "INSERT INTO user (name, email, mobile, password, token, is_verified, added_on) VALUES (?, ?, ?, ?, ?, 0, ?)";
    $stmt_insert = mysqli_prepare($con, $query_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssssss", $name, $email, $mobile, $password, $token, $added_on);

    if (mysqli_stmt_execute($stmt_insert)) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'adityakumarsingh95093@gmail.com';
            $mail->Password = 'vfxn hnjp auiv iebh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('adityakumarsingh95093@gmail.com', 'Aditya Singh');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = "Thanks for registration! Click the link below to verify your email address: <a href='http://localhost/ecom/verify.php?token=$token'>Verify Email</a>";
            $mail->AltBody = "Click the link below to verify your email address: http://localhost/ecom/verify.php?token=$token";

            $mail->send();
            echo 'insert';
        } catch (Exception $e) {
            echo "email_error: " . $mail->ErrorInfo;
        }
    } else {
        echo "insert_error: " . mysqli_error($con);
    }
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>