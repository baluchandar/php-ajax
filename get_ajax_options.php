<?php
include "config.php"; ?>

<di class="response_row col-md-12">
<div class="col-md-2">
    <div class="form-group">
        <lable>Brand<span class="asterisk">*</span></lable>
        <select required="true" name="brand[]" class="form-control">
            <option value="">Select Brand</option>
            <?php
            $brand_query = mysqli_query($con, "select *from tbl_brands where status='1'");
            while ($row = mysqli_fetch_assoc($brand_query)) {
                ?>
                <option value="<?= $row['id'] ?>"><?= $row['brand_name'] ?></option>
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
            while ($row = mysqli_fetch_assoc($design_query)) {
                ?>
                <option value="<?= $row['id'] ?>"><?= $row['design_name'] ?></option>
            <?php }
            ?>
        </select>
    </div>  
</div>    

<div class="col-md-2">
    <div class="form-group">
        <lable>Brand<span class="asterisk">*</span></lable>
        <select required="true" name="color[]" class="form-control">
            <option value="">Select Color</option>
            <?php
            $color_query = mysqli_query($con, "select *from tbl_colors where status='1'");
            while ($row = mysqli_fetch_assoc($color_query)) {
                ?>
                <option value="<?= $row['id'] ?>"><?= $row['color_name'] ?></option>
            <?php }
            ?>
        </select>
    </div>  
</div>    

<div class="col-md-1">
    <div class="form-group">
        <lable>Brand<span class="asterisk">*</span></lable>
        <select required="true" name="size[]" class="form-control">
            <option value="">--</option>
            <?php
            $size_query = mysqli_query($con, "select *from tbl_sizes where status='1'");
            while ($row = mysqli_fetch_assoc($size_query)) {
                ?>
                <option value="<?= $row['id'] ?>"><?= $row['size_name'] ?></option>
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
<div class="col-md-1">
    <br>
    <a onclick="remove_option_row(event)" class="label label-danger"><i class="fa fa-times"></i> Remove</a>
</div>
</di>


