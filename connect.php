<?php

$Firstname = $_POST['Firstname'];
$Lasttname = $_POST['Lastname'];
$EmailAddress = $_POST['EmailAddress'];
$TelephoneNumber = $_POST['TelephoneNumber'];
$Website = $_POST['Website'];
$Department = $_POST['Department'];
$File = $_POST['File'];
$Message = $_POST['Message'];
//Database Connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error)
{
    die('Connection Failed:' .$conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into formdata(Firstname, Lastname, EmailAddress, TelephoneNumber, 
    Website, Department, File, Message) values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssissbs" ,$Firstname, $Lasttname, $EmailAddress, $TelephoneNumber, $Website, $Department, 
    $File, $Message);
$stmt->execute();
echo "Registration Successful..!!";
$stmt->close();
$conn->close();
}
?>