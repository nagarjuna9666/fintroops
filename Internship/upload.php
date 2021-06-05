<?php
$name=$_POST['Fname'];
$phoneno=$_POST['MNum'];
$address=$_POST['Address'];
$school=$_POST['School/College'];
$enroll=$_POST['enroll'];
$photo=$_POST['myImage'];
if(!empty($name) || !empty($phoneno) || !empty($school) || !empty($address) || !empty($enroll) || !empty($photo))
{
    $conn=new mysqli('localhost','root','','internship');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $INSERT=$conn->prepare("INSERT into fintroops(name,pno,address,college,enroll,photo) values(?,?,?,?,?,?)");
        $INSERT->bind_param("sisssb",$name,$phoneno,$address,$school,$enroll,$photo);
        $INSERT->execute();

        $INSERT->close();
        $conn->close();
    }
}
else{
    echo "All fields are required";
    die();
}
?>
