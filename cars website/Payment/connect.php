<?php
    $FullNAME = $_POST['f_name'];
    $EMAIL = $_POST['email'];
    $ADDRESS = $_POST['addr'];
    $CITY= $_POST['city'];
    $STATE = $_POST['state'];
    $PIN_CODE = $_POST['pincode'];
    $CREDIT_CARD_NUMBER = $_POST['creditcard'];
    $EXP_MONTH= $_POST['exp'];
    $EXP_YEAR= $_POST['year'];
    $CVV= $_POST['cvv'];

 //Database Connection
    $conn = new mysqli('localhost','root','','cardb');
    if($conn->connect_errno)
    {
       die('Connection Failed : '.$conn->connect_errno); 
    }
    else
    {
        $stmt = $conn->prepare("insert into payment(Fullname, EMAIL, ADDRESS, CITY, STATE, PIN CODE,CREDIT CARD,EXP MONTH,EXP YEAR,CVV) values(?, ?, ?, ?, ?, ?, ?,?,?,?)");
        $stmt->bind_param("sssssiisiii", $FULLNAME, $EMAIL, $ADDRESS, $CITY, $STATE, $PIN_CODE, $CREDIT_CARD_NUMBER,$EXP_MONTH,$EXP_YEAR,$CVV);
        $stmt->execute();
        echo "Payment Successfully...";
        $stmt->close();
        $conn->close();
    }

?>