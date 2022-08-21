<?php
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phnoenumber'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $gender = $_POST['gender'];

    if (!preg_match("/^[a-zA-Z ]+$/",$fullname)) 
    {
        $fullname_error = "Name must contain only alphabets and space";
    }
    if (!preg_match("/^[a-zA-Z1-9 ]+$/",$username)) 
    {
        $username_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($phonenumber) < 10) 
    {
        $phonenumber_error = "Mobile number must be minimum of 10 characters";
    }
    if(strlen($password) < 6) 
    {
        $password_error = "Password must be minimum of 6 characters";
    }       
    if($password != $confirmpassword) 
    {
        $confirmpassword_error = "Password and Confirm Password doesn't match";
    }
    if(empty($_POST['gender']))
    {
        $msg_gender = "You must select a gender";
    }

    //Database Connection
    $conn = new mysqli('localhost','root','','cardb');
    if($conn->connect_errno)
    {
       die('Connection Failed : '.$conn->connect_errno); 
    }
    else
    {
        $stmt = $conn->prepare("insert into registration(fullname, username, email, phonenumber, password, confirmpassword, gender) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $fullname, $username, $email, $phonenumber, $password, $confirmpassword, $gender);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }

?>