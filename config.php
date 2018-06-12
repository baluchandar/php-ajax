<?php

if(!isset($_SESSION['connection'])){
    $con= mysqli_connect("localhost", "root", "", "junfirst_db");
    $_SESSION['connection']=$con;
}
if (mysqli_connect_errno())
    die("Failed to connect to MySQL: " . mysqli_connect_error());

 $con = $_SESSION['connection'];
