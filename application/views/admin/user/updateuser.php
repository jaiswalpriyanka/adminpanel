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

        <h3>Update Details</h3>
        <hr>
   <div class="row">
   <br>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form method="post" action="<?php echo current_url(); ?>" enctype="multipart/form-data">

              <div class="form-group">
                 <label for="firstName">Type</label>
                  
                  <select id="type" class="form-control" name="type" required="required" autofocus="autofocus">
                  <option <?php if($user[0]['type']=='agent'){echo "selected";}; ?> value="agent">Agent</option>
                  <option <?php if($user[0]['type']=='vendor'){echo "selected";}; ?>  value="vendor">vendor</option>
                  <option <?php if($user[0]['type']=='client'){echo "selected";}; ?>  value="client">Client</option>
                  </select>
              </div> 


                <div class="form-group">
                 <label for="firstName">Name</label>
                  <input type="text" id="firstName" class="form-control" name="fname" placeholder="First name" required="required" autofocus="autofocus" value="<?php echo $user[0]['name']; ?>">
               
                </div>

         
              <div class="form-group">
              <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"  required="required" value="<?php echo $user[0]['email']; ?>">
            </div>

          
            <div class="form-group">
              <label for="inputmobile">Mobile</label>
              <input type="text" id="inputmobile" class="form-control" placeholder="Contact Number" name="mobile"  required="required" value="<?php echo $user[0]['contact_no']; ?>">
            
            </div>
         

           <div class="form-group">
            <label for="inputdob">Profile Image</label>
            <?php if(!empty($user[0]["profile_image"])) { ?> 
              <img src="<?php echo base_url('uploads/profiles/'.$user[0]["profile_image"]);?>" height="100px";  width="100px">
              <br/>
            <?php } ?>
                <input type="file" id="image" class="form-control" name="image" required="required">
              </div>


          <input type="submit" class="btn btn-primary btn-block" value="Register" />

        </form>
	 </div>
	 <div class="col-md-2"></div>


	 <br>
</div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>