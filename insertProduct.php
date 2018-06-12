<?php

include "config.php";
extract($_POST);

if (isset($_POST['submit'])) {

    $status = 1;
    $date = date('Y-m-d H:i:s');
    $imgName = $_FILES['image']['name'];


    if ($type == 'simple') {

        $query = "INSERT INTO tbl_products (name,type,product_code,price,color_id,brand_id,design_id,category_id,size_id,image,quantity,remaining_items,tax,shipping_charges,cash_on_delivery, description,status,created_on,updated_on)VALUES('$name','$type','$name','$price','$color','$brand','$design','$category','$size','$imgName','$quantity','$quantity','$tax','$shipping_charges','$cash_on_delivery','$description','$status','$date','$date')";
    } else if ($type == 'configurable') {
       $query = "INSERT INTO tbl_products (name,type,product_code,price,color_id,brand_id,design_id,category_id,size_id,image,quantity,remaining_items,tax,shipping_charges,cash_on_delivery, description,status,created_on,updated_on)VALUES('$name','$type','$name','$price[0]','$color[0]','$brand[0]','$design[0]','$category','$size[0]','$imgName','$quantity[0]','$quantity[0]','$tax','$shipping_charges','$cash_on_delivery','$description','$status','$date','$date')";
    }
 

    $insert = mysqli_query($con, $query);


    $insert_id = mysqli_insert_id($con);


    if ($insert_id > 0) {

        if ($type == 'configurable') {
            $i = 0;
            foreach ($quantity as $qty) {
                $insert = mysqli_query($con, "insert into tbl_configurable_options(product_id,brand_id,color_id,size_id,design_id,quantity,price,remaining_products)values('$insert_id','$brand[$i]', '$color[$i]','$size[$i]','$design[$i]','$qty','$price[$i]','$qty')");
            
                $i++;
            }
        }

        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/products/' . $insert_id . '.jpg');
        header('location:products?success');
        exit;
    }
}
header('location:product_form?fail');
