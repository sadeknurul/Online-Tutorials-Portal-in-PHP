<?php 

 
 $query = query("SELECT * FROM courses WHERE id = " . escape_string($_GET['id']) . "");
 confirm($query);
 while($row = fetch_array($query)) {
	$name        = remove_slashes(escape_string($row['name']));
	$image       = escape_string($row['image']);
	 
	 
 }



 update_course();


?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Course

</h1>
</div>
               

<div class="row">
<form action="" method="post" enctype="multipart/form-data" style="width:100%;">


<div class="col-md-8">

	<div class="form-group">
		<label for="product-title">Name * </label>
        
            <input type="text" name="name" id="" value="<?php echo stripslashes(trim($name)); ?>" class="form-control" required />
       
    </div>
	
	<div class="form-group">
		<label for="product-title">Image * </label>
        
            <input type="file" name="image" id="" class="form-control" />
			<img src="../resources/tutorial-images/<?php echo $image; ?>" alt="" width="200" />
       
    </div>
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>

</aside><!--SIDEBAR-->
   
</form>
</div>


  