<?php $this->load->view('admin/include/top-header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo site_url();?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
    <a href="<?php echo site_url('Home/dashboard'); ?>" class="btn btn-info" style="float: right;">Back</a>

        <h3>Update Password</h3>
        <hr>
   <div class="row">
   <br>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form method="post" action="<?php echo site_url('Home/changepassword'); ?>" enctype="multipart/form-data">

             <?php echo alertmsg();?>
                <div class="form-group">
                 <label for="oldpwd">Old Password</label>
                  <input type="password" class="form-control" name="oldpwd" placeholder="Old Password" required="required" autofocus="autofocus">
               
                </div>

         
              <div class="form-group">
              <label for="inputEmail">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="New Password"  required="required">
            </div>

          
            <div class="form-group">
              <label for="inputmobile">Confirm Password</label>
              <input type="password" id="inputmobile" class="form-control" placeholder="Confirm Password" name="cpassword"  required="required">
            
            </div>
         

          <input type="submit" class="btn btn-primary btn-block" value="Change Password" />

        </form>
	 </div>
	 <div class="col-md-2"></div>


	 <br>
</div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>