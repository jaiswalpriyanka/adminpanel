<?php $this->load->view('admin/include/top-header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo site_url();?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">User List</li>
        </ol>
    <a href="<?php echo site_url('Home/user'); ?>" class="btn btn-info" style="float: right;">Back</a>

        <h3>View User Details</h3>
        <hr>
   <div class="row">
   <br>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form method="post" action="<?php echo current_url(); ?>">

            <div class="form-group">
              <label for="firstName">First name</label>
                <div class="form-group">
                  <input type="text" id="firstName" class="form-control" name="fname" placeholder="First name" required="required" autofocus="autofocus" value="<?php echo $user[0]['name']; ?>">
                </div>
              </div>


          <div class="form-group">
          <label for="inputEmail">Email address</label>
            <div class="form-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"  required="required" value="<?php echo $user[0]['email']; ?>">
              
            </div>
          </div>

           <div class="form-group">
            <label for="inputmobile">Mobile</label>
            <div class="form-group">
              <input type="text" id="inputmobile" class="form-control" placeholder="Contact Number" name="mobile"  required="required" value="<?php echo $user[0]['contact_no']; ?>">
             
            </div>
          </div>
        <?php if(!empty($user[0]["profile_image"])){ ?>
            <div class="form-group">
            <label for="inputdob">Profile Image</label>
            <img src="<?php echo base_url('uploads/profiles/'.$user[0]["profile_image"]);?>" height="150px";  width="150px">
          </div>

          <?php } ?>
           
        </form>
	 </div>
	 <div class="col-md-2"></div>


	 <br>
</div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>