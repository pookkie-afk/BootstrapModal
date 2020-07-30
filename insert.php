<?php
require 'connectDB.php';
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$web = $_POST['web'];

if ($id != '') {
    $sql = "UPDATE tablestudent set fname='$fname' , lname= '$lname' , email = '$email' , web = '$web' WHERE id = '$id' ";
} else {
    $sql = "INSERT into tablestudent (fname,lname,email,web) values ('$fname','$lname','$email','$web') ";

}

if (mysqli_query($conn,$sql)) {
    echo "Data Complete";
}