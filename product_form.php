<?php include "config.php"; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Product</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
    <?php include "header.php"; ?>
    <div class="container"> 
        <div class="col-md-12 col-sm-12">

            <?php if (isset($_GET['fail'])): ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong> Could not Inserted! Please Try Again.
                </div>
            <?php endif; ?>

            <div class="headding"><h4>Add New Product</h4></div>
            <div class="filedsets">
                <form action="insertProduct.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8 productFormDiv">
                            <fieldset>
                                <div class="form-group">
                                    <lable>Category<span class="asterisk">*</span></lable>
                                    <select required="true" name="category" class="form-control">
                                        <option value="">Select Category</option>
                                <?php $sql = mysqli_query($con, "select id,category_name from tbl_category where status='1'");
                                while($row = mysqli_fetch_assoc($sql)){
                                    ?>
                                        <option value="<?=$row['id']?>"><?=$row['category_name']?></option>                                        
                                        <?php
                                } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <lable for="name">Name <span class="asterisk">*</span></lable>
                                    <input type="text" required="true" name="name" id="name" class="form-control">
                                </div>
                                
                        <?php if($_GET['type']=='simple'){ ?>        
                                <div class="form-group">
                                    <lable for="name">Price <span class="asterisk">*</span></lable>
                                    <input type="number" required="true" name="price" id="name" class="form-control">
                                </div>
                                 <div class="form-group">
                                <lable>Quantiy<span class="asterisk">*</span></lable>
                                <input type="number" required="true" name="quantity" value="0" class="form-control">
                            </div>
                                <div class="form-group">
                                    <lable for="brand">Brand <span class="asterisk">*</span></lable>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select Brand</option>
                                        <?php $select = mysqli_query($con, "select id,brand_name from tbl_brands where status='1'");
                                        while ($row = mysqli_fetch_array($select)) {
                                            ?>
                                            <option  value="<?= $row['id'] ?>"><?= $row['brand_name'] ?></option>
<?php } ?>
                                    </select>    
                                </div>
                                <div class="form-group">
                                    <lable for="design">Design<span class="asterisk">*</span></lable>
                                    <select name="design" id="design" class="form-control">
                                        <option value="">Select Design</option>
                                        <?php $select = mysqli_query($con, "select id,design_name from tbl_designs where status='1'");
                                        while ($row = mysqli_fetch_array($select)) {
                                            ?>
                                            <option  value="<?= $row['id'] ?>"><?= $row['design_name'] ?></option>
<?php } ?>
                                    </select>    
                                </div>

                                <div class="form-group">
                                    <lable for="color">Color<span class="asterisk">*</span></lable>
                                    <select name="color" id="color" class="form-control">
                                        <option value="">Select Color</option>
                                        <?php $select = mysqli_query($con, "select id,color_name from tbl_colors where status='1'");
                                        while ($row = mysqli_fetch_array($select)) {
                                            ?>
                                            <option  value="<?= $row['id'] ?>"><?= ucfirst($row['color_name']) ?></option>
<?php } ?>
                                    </select>    
                                </div>
                               <div class="form-group">
                                    <lable for="size">Size<span class="asterisk">*</span></lable>
                                    <select required="true" name="size" id="size" class="form-control">
                                       <option value="">Select Size</option>
                     <?php
                     $size_query = mysqli_query($con, "select * from tbl_sizes where status='1'");
                        while($row= mysqli_fetch_array($size_query)){
                            ?>   
                        <option value="<?=$row['id']?>"><?=$row['size_name']?></option>
                        <?php } ?>
                    </select>
                                </div>
                        <?php } ?>
                             
                                <div class="form-group">
                                    <lable for="image">Image<span class="asterisk">*</span></lable>
                                    <input type="file" accept="image/*" required="true" name="image" id="image" class="form-control">
                                </div>
                           
                            <div class="form-group">
                                <lable>Tax<span class="asterisk">*</span></lable>
                                <input type="number" required="true" name="tax" value="0" class="form-control">
                            </div>

                            <div class="form-group">
                                <lable>Shipping Charges<span class="asterisk">*</span></lable>
                                <input type="number" value="0" required="true" name="shipping_charges"  class="form-control">
                            </div>

                            <div class="form-group">
                                <lable for="cod">CashOnDelivery<span class="asterisk">*</span></lable>
                                <select required="true" name="cash_on_delivery" id="cod" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <lable for="description">Description<span class="asterisk">*</span></lable>
                                <textarea required="true" name="description" id="description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="type" value="<?=$_GET['type']?>">
                                 <input type="submit" name="submit"  class="btn btn-primary">
                            </div>  
                            </fieldset>   
                        </div>
                        <div class="col-md-3">
                            <img src="images/tree.png" class="img-responsive">
                        </div>      
                    </div>
                    
                 <?php 
                 if($_GET['type']=='configurable'){?>
                                       
                                            
                    <div class="col-md-12 ajax_options">
                        <h4>Configurable Options :</h4>
                        <div class="col-md-2">
                           <div class="form-group">
                                <lable>Brand<span class="asterisk">*</span></lable>
                                <select required="true" name="brand[]" class="form-control">
                                    <option value="">Select Brand</option>
                                    <?php 
                                    $brand_query = mysqli_query($con, "select *from tbl_brands where status='1'");
                                    while($row = mysqli_fetch_assoc($brand_query)){ 
                                        ?>
                                    <option value="<?=$row['id']?>"><?=$row['brand_name']?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>  
                        </div>
                        
                        <div class="col-md-2">
                           <div class="form-group">
                                <lable>Design<span class="asterisk">*</span></lable>
                                <select required="true" name="design[]" class="form-control">
                                    <option value="">Select Design</option>
                                    <?php 
                                    $design_query = mysqli_query($con, "select *from tbl_designs where status='1'");
                                    while($row = mysqli_fetch_assoc($design_query)){ 
                                        ?>
                                    <option value="<?=$row['id']?>"><?=$row['design_name']?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>  
                        </div>    
                        
                        <div class="col-md-2">
                           <div class="form-group">
                                <lable>Color<span class="asterisk">*</span></lable>
                                <select required="true" name="color[]" class="form-control">
                                    <option value="">Select Color</option>
                                    <?php 
                                    $color_query = mysqli_query($con, "select *from tbl_colors where status='1'");
                                    while($row = mysqli_fetch_assoc($color_query)){ 
                                        ?>
                                    <option value="<?=$row['id']?>"><?=$row['color_name']?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>  
                        </div>    
                        
                        <div class="col-md-1">
                           <div class="form-group">
                                <lable>Size<span class="asterisk">*</span></lable>
                                <select required="true" name="size[]" class="form-control">
                                    <option value="">--</option>
                                    <?php 
                                    $size_query = mysqli_query($con, "select *from tbl_sizes where status='1'");
                                    while($row = mysqli_fetch_assoc($size_query)){ 
                                        ?>
                                    <option value="<?=$row['id']?>"><?=$row['size_name']?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>  
                        </div>
                        
                        <div class="col-md-2">
                           <div class="form-group">
                                <lable>Quantity<span class="asterisk">*</span></lable>
                                <input type="number" class="form-control" name="quantity[]" >
                            </div>  
                        </div> 
                        <div class="col-md-2">
                           <div class="form-group">
                                <lable>Price<span class="asterisk">*</span></lable>
                                <input type="number" class="form-control" name="price[]" >
                            </div>  
                        </div> 
                    </div>
                     <div class="col-md-2 pull-right">
                         <button type="button" onclick="add_new_option()"class="btn btn-warning"><i class="fa fa-plus"></i> New</button>
                        </div>  
                    
                 <?php } ?>
                </form>
            </div>

        </div>   
    </div>
<?php include 'footer.php'; ?>
</body>
<script src="js/scripts.js"></script>

</html>
