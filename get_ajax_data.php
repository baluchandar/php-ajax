<?php
include "config.php";
include 'Pagination.php';
$start = !empty($_POST['page'])?$_POST['page']:0;            
$limit = 5;

/***/
 $where =" and price>='$_POST[price_from]' and price<='$_POST[price_to]'";
 
if(!empty($_POST['size'])){
    $where .= " and P.size_id='$_POST[size]'";
}
if(!empty($_POST['searchKey'])){
    $where .= " and P.name like '%$_POST[searchKey]%'";
}

if(!empty($_POST['filter_brand'])){ 
    $where .=" and brand_id IN($_POST[filter_brand])";
}
if(!empty($_POST['filter_design'])){ 
    $where .=" and design_id IN($_POST[filter_design])";
}
if(!empty($_POST['filter_color'])){ 
    $where .=" and color_id IN($_POST[filter_color])";
}

/***/
            $p_num = mysqli_query($con, "select count(*)as totalRecords from tbl_products as P where P.status='1' $where");
            $rows = mysqli_fetch_assoc($p_num);
              $pagConfig = array(
        'currentPage' => $start,
        'totalRows' => $rows['totalRecords'],
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
            $pagination = new Pagination($pagConfig);
            $productPagination = $pagination->createLinks();
            ?>
            <div id="display_products">
                
                <div class="col-md-12">
                    <h4 class="pull-left">Displaying Products </h4>
                    <div class="pull-right"><?php echo $productPagination;  ?></div>
                    <div class="clearfix"></div><hr>
                    <div class="row">
                        
                        <table class="table table-bordered table-hover table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>ProductName</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Brand</th>
                                    <th>Design</th>
                                    <th class="descTh">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                        
                        <?php    
                        $p_qry = mysqli_query($con, "select C.color_name, S.size_name ,B.brand_name,D.design_name, P.*from tbl_products as P inner join tbl_brands as B on B.id=P.brand_id inner join tbl_designs as D on D.id=P.design_id inner join tbl_colors as C on C.id=P.color_id inner join tbl_sizes as S on S.id=P.size_id where P.status='1' $where order by P.id desc LIMIT $start,$limit");
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($p_qry)) {
                            ?>
                            <tr>                                   
                                <td><?=$row['name']?></td>                                    
                                <td><img src="uploads/products/<?=$row['id']?>.jpg" class="img-responsive" width="60"></td>                                    
                                <td><?=$row['price']?>/-</td>                                    
                                <td><?=$row['color_name']?></td>                                    
                                <td><?= strtoupper($row['size_name'])?></td>                                    
                                <td>
                                    <img src="uploads/brands/<?=$row['brand_id']?>.jpg" class="img-responsive" width="30">
                                    <small><?=$row['brand_name']?></small>
                                </td>                                    
                                <td>
                                    <img src="uploads/designs//<?=$row['design_id']?>.jpg" class="img-responsive" width="30">
                                    <small><?=$row['design_name']?></small>
                                </td>                                    
                                 <td><?=substr($row['description'], 0, 20)?> 
                                    <a data-placement="right"  data-id="<?=$i?>" data-toggle="popover" data-title="<?=$row['name']?>" data-container="body"  data-html="true"  href="javascript:void(0)">..more</a>
                                    
                                     <div class="hide" id="popover-content_<?=$i?>">
                                        <form action="">
                                       <?php if($row['type']=='configurable'){
                                           $select = mysqli_query($con, "select B.brand_name,C.color_name,D.design_name,S.size_name,O.*from tbl_configurable_options as O inner join tbl_brands as B on B.id=O.brand_id inner join tbl_designs as D on D.id=O.design_id inner join tbl_sizes as S on S.id=O.size_id inner join tbl_colors as C on C.id=O.color_id where product_id='$row[id]' and remaining_products>0");
                                           $brand_arr =$color_arr=$design_arr=$size_arr= array();
                                           while($option = mysqli_fetch_assoc($select)){
                                               $brand_arr[$option['brand_id']]=$option['brand_name']; 
                                               $color_arr[$option['color_id']]=$option['color_name']; 
                                               $design_arr[$option['design_id']]=$option['design_name']; 
                                               $size_arr[$option['size_id']]=$option['size_name']; 
                                           }
                                           ?>
                                            <label>Brand : </label>
                                            <select name="brand" required="true" class="form-control">
                                                <?php echo (count($brand_arr)>1)?"<option value=''>Select Brand</option>":'';
                                                foreach($brand_arr as $key=>$val){
                                                    echo "<option value='".$key."'>".$val."</option>";
                                                }?>
                                            </select>
                                            
                                            <label>Design : </label>
                                            <select name="design" required="true" class="form-control">
                                                 <?php echo (count($design_arr)>1)?"<option value=''>Select Design</option>":'';
                                                foreach($design_arr as $key=>$val){
                                                    echo "<option value='".$key."'>".$val."</option>";
                                                }?>
                                            </select>
                                            <label>Color : </label>
                                            <select name="color" required="true" class="form-control">
                                                 <?php echo (count($color_arr)>1)?"<option value=''>Select Color</option>":'';
                                                  foreach($color_arr as $key=>$val){
                                                    echo "<option value='".$key."'>".$val."</option>";
                                                }?>
                                            </select>
                                            <label>Size : </label>
                                            <select name="size" required="true" class="form-control">
                                                 <?php echo (count($size_arr)>1)?"<option value=''>Select Size</option>":'';
                                                  foreach($size_arr as $key=>$val){
                                                    echo "<option value='".$key."'>".$val."</option>";
                                                }?>
                                            </select>
                                       </form>
                                       <?php } else{
                                           echo $row['description'];
                                       } ?>
                                        <hr>
                                       <!--input type="submit" name="submit" value="Add To Cart" class="btn btn-primary">
                                       <input type="submit" name="buy" value="Buy Now" class="btn btn-success"-->
                                    </div>
                                    
                                </td>                    
                            </tr>
                            <?php
                            
                            $i++;
                        }
                        if(mysqli_num_rows($p_qry)<=0){
                           echo "<tr><td colspan=9 align='center'><h4>No Products Found</h4></td></tr>"; 
                        }
                        
                        ?>
                            </tbody>
                        </table>
                    <?php echo $productPagination;  ?>
                </div>
            </div>
        </div>  