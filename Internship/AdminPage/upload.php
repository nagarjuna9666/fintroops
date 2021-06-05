<?php
$name=$_POST['Fname'];
$phoneno=$_POST['MNum'];
$address=$_POST['Address'];
$school=$_POST['School/College'];
$enroll=$_POST['enroll'];
$image=$_POST['myImage'];
if(!empty($name) || !empty($phoneno) || !empty($school) || !empty($address) || !empty($enroll) || !empty($image))
{
    $conn=new mysqli('localhost','root','','fintroops');
    if($conn->connect_error)
    {
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $INSERT=$conn->prepare("INSERT into id_card(name,phoneno,address,school,enroll,image) values(?,?,?,?,?,?)");
        $INSERT->bind_param("sisssb",$name,$phoneno,$address,$school,$enroll,$image);
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
