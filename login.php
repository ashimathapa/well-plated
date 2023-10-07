<?php
include 'config.php';
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE  email='$email' AND password='$pass' ") or die('query failed');
    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);
        // if ($row['user_type'] == 'admin') {
        //     $_SESSION['admin_name'] = $row['name'];
        //     $_SESSION['admin_email'] = $row['email'];
        //     $_SESSION['admin_id'] = $row['user_id'];
        //     header('location:admin_page.php');
        // } elseif ($row['user_type'] == 'user') {
        $_SESSION['user_name'] = $row['firstname'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['user_id'];
        // header('location:home.php');
        $message = ['success' => true, 'message' => "Login success"];
        echo json_encode($message);
        // }
    } else {
        $message = ['success' => false, 'message' => "Either email or password is incorrect"];
        echo json_encode($message);
    }
} else {
    $message = ['success' => false, 'message' => "All fields are required"];
    echo json_encode($message);
}
