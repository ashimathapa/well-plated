<?php
include 'config.php';
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE  email='$email' AND password='$pass' ") or die('query failed');
    if (mysqli_num_rows($select_users) > 0) {
        $message = ['success' => false, 'message' => "User already exists"];
        echo json_encode($message);
    } else {
        mysqli_query($conn, "INSERT INTO `users`(firstname,lastname,email,password) VALUES('$firstname','$lastname','$email','$pass')") or
            die('query failed');
        $message = ['success' => true, 'message' => "You have registered successfully"];
        echo json_encode($message);
    }
} else {
    $message = ['success' => false, 'message' => "All fields are required"];
    echo json_encode($message);
}
