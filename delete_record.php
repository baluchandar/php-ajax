<?php
include "config.php"; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tableName = 'tbl_designs';
    if($_GET['attr']=='brands')
    {
        $tableName = 'tbl_brands';
    }
    $del  = mysqli_query($con, "update $tableName SET status='0' where id='$id'");
    if($del){
        @unlink('uploads/'.$_GET['attr'].'/'.$id.'.jpg');
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);