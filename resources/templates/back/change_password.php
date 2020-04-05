         
<?php change_password(); ?>
<h1 class="page-header">
  Change Password

</h1>


<div class="col-md-6">
   <h3 class="bg-success"><?php display_message(); ?></h3> 
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Your current password</label>
            <input type="text" name="c_password" class="form-control" required />
        </div>
		
		<div class="form-group">
            <label for="category-title">New password</label>
            <input type="text" name="n_password" class="form-control" required />
        </div>
		
		<div class="form-group">
            <label for="category-title">Confirm password</label>
            <input type="text" name="cn_password" class="form-control" required />
        </div>

        <div class="form-group">
            
            <input type="submit" class="btn btn-primary" name="change_password" value="Change Now">
        </div>      


    </form>


</div>


<div class="col-md-8">

    

</div>

