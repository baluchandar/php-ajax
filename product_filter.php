<?php 

$price_qry = mysqli_query($con, "select min(price)as minprice , max(price)as maxprice from tbl_products");
$price_arr = mysqli_fetch_array($price_qry);
echo "<input type='hidden' id='min_price' value='".$price_arr['minprice']."'>";
echo "<input type='hidden' id='max_price' value='".$price_arr['maxprice']."'>";
?>
<div class="col-md-12 col-sm-12">

                <div class="col-md-3">
                    <label for="amount">Price range:</label>
                    <div id="slider-range"></div>
                    <input type="text" id="priceFrom" class="rangeInput rangeInput1" readonly name="priceFrom" >
                    <input type="text" id="priceTo" class="rangeInput rangeInput2"  name="priceTo" readonly  >
                </div>
                
                <div class="col-md-3 col-sm-12">
                    <label>Size : </label>
                    <select name="filter-size" class="filterSelect" onchange="searchFilter()" id="filter-size">
                        <option value="">Select Size</option>
                     <?php
                     $size_query = mysqli_query($con, "select * from tbl_sizes where status='1'");
                        while($row= mysqli_fetch_array($size_query)){
                            ?>   
                        <option value="<?=$row['id']?>"><?=$row['size_name']?></option>
                        <?php } ?>
                    </select>
                    <hr>
                    <label>Search:</label>
                    <input type="text" id="search-keyword" placeholder="Search Keyword" onkeyup="searchFilter()" class="form-control">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Color : </label>
                    <ul class="filter_ul">
                    <?php 
                    $brand_query = mysqli_query($con, "select C.*,P.id as pc_id from tbl_products as P inner join tbl_colors as C ON C.id=P.color_id where P.status='1' group by P.color_id");
                        while($row= mysqli_fetch_array($brand_query)){
                            ?>
                            <li>
                                <input type="checkbox" name="filter-color[]" id="color_<?=$row['pc_id']?>" value="<?=$row['id']?>" onclick="searchFilter()"/>
                                <label for="color_<?=$row['pc_id']?>"><span><?=$row['color_name']?></span></label>
                            </li>
                            
                        <?php
                        } ?>
                       
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="hr_line"></div>   
                <div class="col-md-6 col-sm-12">
                    <label>Brand : </label>
                    <ul class="filter_ul">
                    <?php 
                    $brand_query = mysqli_query($con, "select *from tbl_brands where status='1'");
                        while($row= mysqli_fetch_array($brand_query)){
                            ?>
                            <li>
                                <input type="checkbox" name="filter-brand[]" id="brand_<?=$row['id']?>" value="<?=$row['id']?>" onclick="searchFilter()"/>
                                <label for="brand_<?=$row['id']?>"><img src="uploads/brands/<?=$row['id']?>.jpg" class="filter_check" /></label>
                            </li>
                            
                        <?php
                        } ?>
                       
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label>Designs : </label>
                    <ul class="filter_ul">
                    <?php 
                    $design_query = mysqli_query($con, "select *from tbl_designs where status='1'");
                        while($row= mysqli_fetch_array($design_query)){
                            ?>
                            <li>
                                <input type="checkbox" name="filter-design[]" id="design_<?=$row['id']?>" value="<?=$row['id']?>" onclick="searchFilter()"/>
                                <label for="design_<?=$row['id']?>"><img src="uploads/designs/<?=$row['id']?>.jpg" class="filter_check" /></label>
                            </li>
                            
                        <?php
                        } ?>
                       
                    </ul>
                </div>
                <div class="clearfix"></div>
            <div class="hr_line"></div>   
            </div>