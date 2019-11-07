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
    <a href="<?php echo site_url('Home/adduser'); ?>" class="btn btn-info" style="float: right;">Add</a>

      <?php echo alertmsg();?>
        <h3> Users List</h3>
        <hr>
      

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            User List</div>
          <div class="card-body">
            <div class="table-responsive  ">
            <!-- id="dataTable" -->
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                <?php if(!empty($userlist)){
                  foreach ($userlist as $key => $row) { ?>
                  <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo ucfirst($row['type']);?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['contact_no'];?></td>
                    <td>
                      <a href="<?php echo site_url('Home/showuser/'.encode_id($row['id'])); ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>

                     <a href="<?php echo site_url('Home/edituser/'.encode_id($row['id'])); ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>

                     <a href="<?php echo site_url('Home/deluser/'.encode_id($row['id'])); ?>" class="btn btn-danger" onclick="return del();" ><i class="fa fa-trash" aria-hidden="true"></i></a>

                    </td>
                    </tr>
                  <?php } } ?>
                 
                </tbody>
              </table>
              <div>
              
      <div class="row">
          <?php echo $this->pagination->create_links(); ?>
      </div> 
     

            </div>
            </div>
          </div>
         
        </div>

      </div>
      <!-- /.container-fluid -->

<?php $this->load->view('admin/include/footer'); ?>
<script>
function del()
{
  var x= confirm("You want to delete this");
  if(x==true)
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>