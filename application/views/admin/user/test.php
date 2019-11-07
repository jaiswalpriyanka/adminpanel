<?php $this->load->view('admin/include/top-header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo site_url();?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Users List</li>
        </ol>
    <a href="<?php echo site_url('welcome/adduser'); ?>" class="btn btn-info" style="float: right;">Add</a>

      <?php echo alertmsg();?>

        <!-- Page Content -->
        <h3> Users List</h3>
        <hr>
      

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            User List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>DOB</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>DOB</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php if(!empty($userlist)){
                  foreach ($userlist as $key => $row) { ?>
                  <tr>
                    <td><?php echo $row['fname'];?> <?php echo $row['lname'] ;  ?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo date(('d-m-Y'),strtotime($row['dob'])) ;?></td>
                    </tr>
                  <?php } } ?>
                 
                </tbody>
              </table>
            </div>
          </div>
          



      </div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>