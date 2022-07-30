<?php
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phnoenumber = $_POST['phnoenumber'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];

    //Database Connection
    $conn = new mysqli('localhost','root','','cardb');
    if($conn->connect_errno)
    {
       die('Connection Failed : '.$conn->connect_errno); 
    }
    else
    {
        $stmt = $conn->prepare("insert into registration(fullname, username, email, phonenumber, password, confirmpassword, gender) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $fullname, $username, $email, $phnoenumber, $password, $confirmpassword, $gender);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }

?>