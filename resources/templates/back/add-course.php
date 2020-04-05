<?php add_course(); ?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add New Course

</h1>
</div>
               

<div class="row">
<form action="" method="post" enctype="multipart/form-data" style="width:100%;">


<div class="col-md-8">

	<div class="form-group">
		<label for="">Name * </label>
        
            <input type="text" name="name" id="" class="form-control" required />
       
    </div>
	
	<div class="form-group">
		<label for="">Image * </label>
        
            <input type="file" name="image" id="" required/>
       
    </div>
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>

</aside><!--SIDEBAR-->
   
</form>
</div>


  