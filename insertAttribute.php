<?php

include "config.php";
if (isset($_POST['submit'])) {
    if ($_POST['name']) {
        $status = 1;
        $created_on = date('Y-m-d H:i:s');
        $attribute = $_POST['attribute'];
        $imgName = $_FILES['image']['name'];
        $tableName = "tbl_designs";
        $prefix = "design";
        if ($attribute == 'brands') {
            $tableName = "tbl_brands";
            $prefix = "brand";
        }else if ($attribute == 'category') {
            $tableName = "tbl_category";
            $prefix = "category";
        }
        $query = "INSERT INTO $tableName (" . $prefix . "_name," . $prefix . "_image,status,created_on)values('$_POST[name]','$imgName','$status','$created_on')";
        $insert = mysqli_query($con, $query);
        if ($insert_id = mysqli_insert_id($con)) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$attribute.'/' . $insert_id . '.jpg');
            header("location:attributes?page=" . $attribute . "&success");
            exit;
        }
    }
}
header('Location:attr_form?attr='.$attribute.'&fail');
