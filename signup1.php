<?php

include './connection.php';


if (isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password'])) {

    $username = $_POST['user_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];

    $query = "INSERT INTO user_info (user_name, email_address, password, gender) values ('$username','$email','$password','$gender')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $message = ['success' => true, 'message' => "Sign up success"];
    } else {
        $message = ['success' => false, 'message' => "Something went wrong"];
    }
    echo json_encode($message);
} else {
    $message = ['success' => false, 'message' => "All fields are required"];
    echo json_encode($message);
}
