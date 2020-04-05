<?php add_tutorial(); ?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add New Tutorial

</h1>
</div>
               

<div class="row">
<form action="" method="post" enctype="multipart/form-data" style="width:100%;">


<div class="col-md-8">

	<div class="form-group">
		<label for="">Title * </label>
        
            <input type="text" name="title" id="" class="form-control" required />
       
    </div>
	
	<div class="form-group">
		<label for="">Course * </label>
        <select name="course_id" id="" class="form-control">
        	<option value="">Select Course</option>
        	<?php course_dropdown(); ?>
        </select>
    </div>
	
	<div class="form-group">
		<label for="">Link * </label>
        
            <input type="text" name="link" id="" class="form-control" required />
       
    </div>
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>
	<div class="form-group">
		<label for="">Tutorial Category * </label>
        <select name="category" id="" class="form-control">
        	<option value="document">Document</option>
        	<option value="video">Video</option>
        </select>
    </div>

</aside><!--SIDEBAR-->
   
</form>
</div>


  