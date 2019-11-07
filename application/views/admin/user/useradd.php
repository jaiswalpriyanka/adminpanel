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

        <!-- Page Content -->
        <h3>Add Users</h3>
        <hr>
   <div class="row">
   <br>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form method="post" action="<?php echo current_url(); ?>" enctype="multipart/form-data">


                <div class="form-group">
                 <label for="firstName">Type</label>
                  
                  <select id="type" class="form-control" name="type" required="required" autofocus="autofocus">
                  <option value="agent">Agent</option>
                  <option value="vendor">vendor</option>
                  <option value="client">Client</option>
                  </select>
                </div> 


                <div class="form-group">
                 <label for="firstName">Name</label>
                  <input type="text" id="firstName" class="form-control" name="fname" placeholder="First name" required="required" autofocus="autofocus">
               
                </div>

         
              <div class="form-group">
              <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"  required="required">
            </div>

          
            <div class="form-group">
              <label for="inputmobile">Mobile</label>
              <input type="text" id="inputmobile" class="form-control" placeholder="Contact Number" name="mobile"  required="required">
            
            </div>
         
             <div class="form-group">
                <label for="inputpassword">Password</label>
                <input type="password" id="password" class="form-control" placeholder="password" name="password"  required="required">
              </div>
                   
             <div class="form-group">
                <label for="inputpassword">Profile  Image</label>
                <input type="file" id="image" class="form-control" name="image" required="required">
              </div>
                   

           <!-- <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputdob" name="dob" class="form-control" placeholder="Contact Number"  required="required">
              <label for="inputdob">Dob</label>
            </div>
          </div> -->

          <input type="submit" class="btn btn-primary btn-block" value="Register" />

        </form>
	 </div>
	 <div class="col-md-2"></div>


	 <br>
</div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>