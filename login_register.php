<?php
session_start();
require_once 'config.php';
if(isset($_POST['register'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if($checkEmail->num_rows > 0 ){
        $_SESSION['regist'] = '';
        $_SESSION[''] ='';
    }
    else{
        $conn->query("INSERT INTO users (name,email,password,role) VALUES ('$name','$email','$password','$role')");
    }
    header('Location: index.php');
    exit();



    if(isset($_POST[''])){
        $email = $_POST[''];
        $password =$_POST[''];

        $result = $conn->query("SELECT * From users WHERE email = '$email'");
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            if(password_verify($password,$user['password'])){
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php');
                exit();
            }
        }
    }
}