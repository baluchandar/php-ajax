<?php

include "config.php";

$tableName = 'tbl_designs';
$prefix = 'design';
if(@$_GET['page']=='brands'){
    $tableName = 'tbl_brands';
    $prefix = 'brand';
}else if(@$_GET['page']=='category'){
    $tableName = 'tbl_category';
    $prefix = 'category';
}
$query ="select *from $tableName where status='1' order by id desc"; 
$sql = mysqli_query($con,$query);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add <?=@$_GET['page']?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    </head>
    <body>
        <?php include "header.php"; ?>
        <div class="container">
            <h4>Displaying <?=@ucfirst($_GET['page'])?> <a href="attr_form?attr=<?=@$_GET['page']?>" class="pull-right btn btn-success"><i class="fa fa-plus"></i> Add New</a></h4>
            <hr>
            <div class="col-md-12 col-sm-12">
                <table class="table table-bordered table-hover table-striped table-responsive">
                    <thead>
                        <th>Name</th>
                        <th>Image</th>
                        <!--th>Status</th-->
                        <th>Delete</th>
                    </thead>
                    <tbody>
                      <?php while($row = mysqli_fetch_assoc($sql)){ ?>
                        <tr>
                            <td><?=$row[$prefix.'_name']?></td>
                            <td><img src="uploads/<?=$_GET['page'].'/'.$row['id'].'.jpg'?>" class="img-responsive attr_tbl_icon" ></td>
                            <!--td><lable class="label label-<?=$row['status']?'success':'danger'?>" ><?=$row['status']?'Active':'In Active'?></lable></td-->
                            <td align="center"><a href="delete_record?id=<?=$row['id']?>&attr=<?=$_GET['page']?>"><i class="fa fa-trash" title="Delete"></i></a></td>
                        </tr>
                      <?php } if(mysqli_num_rows($sql)<=0){
                          echo "<tr><td colspan='4' align='center'>No Records Found </td></tr>";
                      }?>
                    </tbody>
                </table>    
            </div>
        </div>    
            <?php include "footer.php"; ?>
    </body>    