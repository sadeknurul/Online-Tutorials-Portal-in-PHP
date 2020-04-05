
<!-- Begin Page Content -->
        <div class="container-fluid">

          <h3 class="bg-success text-center"><?php display_message(); ?></h3>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tutorial > All Tutorials</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

			<tr>
				<th>SN</th>
				<th>Title</th>
				<th>Course</th>
				<th>Link</th>
				<th>Category</th>
				<th>Date</th>
				<th>Delete</th>
			</tr>
			</thead>
		<tbody>

			<?php tutorials_in_admin(); ?>
     
		</tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
