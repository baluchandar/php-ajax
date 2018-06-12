<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Brand</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include "header.php"; ?>
        <div class="container"> 
       <div class="col-md-12 col-sm-12">
          
           <?php  if(isset($_GET['fail'])): ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <strong>Sorry!</strong> Could not Inserted! Please Try Again.
            </div>
           <?php endif; ?>
           
           <div class="headding"><h4>Add New <?= ucfirst($_GET['attr'])?></h4></div>
           <div class="col-md-4 col-md-offset-3">
               <form action="insertAttribute.php" method="post" enctype="multipart/form-data">
                   <div class="row">
                       <div class="fieldset">
                            <fieldset>
                                 <div class="form-group">
                                     <lable for="name">Name <span class="asterisk">*</span></lable>
                                     <input type="text" required="true" name="name" id="name" class="form-control">
                                 </div>
                                 <div class="form-group">
                                     <lable for="image">Choose Image<span class="asterisk">*</span></lable>
                                     <input accept="image/*" type="file" required="true" name="image" id="image" class="form-control">
                                     <input type="hidden" name="attribute" value="<?=$_GET['attr']?>">
                                 </div>
                                 <div class="form-group">
                                     <input type="submit" name="submit"  class="btn btn-primary">
                                 </div>  
                            </fieldset>   
                       </div>
                   </div>
               </form>
           </div>
          
       </div>   
       </div>
        <?php include "footer.php"; ?>
    </body>
</html>
