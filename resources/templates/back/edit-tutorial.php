<?php 
	$query = query("SELECT * FROM tutorials WHERE id = " . escape_string($_GET['id']) . "");
	confirm($query);
	while($row = fetch_array($query)) {
		$title       = remove_slashes(escape_string($row['title']));
		$course_id 	 = escape_string($row['course_id']);
		$course_name = course_name($course_id);
		$link 		 = escape_string($row['link']);
		$category 	 = escape_string($row['category']);
	 
	 
	}
	update_tutorial(); 
?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Update Tutorial

</h1>
</div>
               

<div class="row">
<form action="" method="post" enctype="multipart/form-data" style="width:100%;">


<div class="col-md-8">

	<div class="form-group">
		<label for="">Title * </label>
        
            <input type="text" name="title" id="" class="form-control" value="<?php echo stripslashes(trim($title)); ?>" required />
       
    </div>
	
	<div class="form-group">
		<label for="">Course * </label>
        <select name="course_id" id="" class="form-control">
        	<option value="<?php echo $course_id; ?>"><?php echo $course_name; ?></option>
        	<?php course_dropdown(); ?>
        </select>
    </div>
	
	<div class="form-group">
		<label for="">Link * </label>
        
            <input type="text" name="link" id="" class="form-control" value="<?php echo $link; ?>" required />
       
    </div>
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>
	<div class="form-group">
		<label for="">Tutorial Category * </label>
        <select name="category" id="" class="form-control">
        	<option value="<?php echo $category; ?>"><?php echo $category; ?></option>
        	<option value="document">Document</option>
        	<option value="video">Video</option>
        </select>
    </div>

</aside><!--SIDEBAR-->
   
</form>
</div>


  