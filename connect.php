<?php
if(isset($_POST['submit'])){
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
//database connection

$conn = new mysqli('localhost:3310','root','','cafereg2023');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into customerinfo(username,phone,email,password,password2)
        values(?,?,?,?,?)");
        $stmt->bind_param("sisss", $username, $phone,$email, $password, $password2);
        $stmt->execute();
        echo "<script>alert('Registration Successfully...');</script>";
        $stmt->close();
        $conn->close();
    }
 

}
?>