<?php


    $Fullname = $_POST['Fullname'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $City= $_POST['City'];
    $State = $_POST['State'];
    $pincode= $_POST['pincode'];
    $Creditcardnumber= $_POST['Creditcardnumber'];
    $Expmonth= $_POST['Expmonth'];
    $Expyear= $_POST['Expyear'];
    

    $conn = new mysqli('localhost','root','','cardb');
    if($conn->connect_error)
    {
       die('Connection Failed : '.$conn->connect_error); 
    }
    else
    {
        $stmt = $conn->prepare("insert into payment(Fullname,Email,Address,City,State,pincode,Creditcardnumber,Expmonth,Expyear ) values (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssiisi",$Fullname, $Email, $Address, $City, $State, $pincode, $Creditcardnumber, $Expmonth, $Expyear);
        $stmt->execute();
        echo "Register successfull";
        $stmt->close();
        $conn->close();
    }
?>