<div class="content-wrapper"> 
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $heading;?></h1>
          </div>
          <div class="col-sm-6 text-right">
             <a href="<?php echo base_url('user/export_user_csv');?>" class="btn btn-success">Download Users</a>
          </div>    
          
        </div>
      </div>
    </section>
     
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                       </div>
                        <div class="row">
                            <div class="col-sm-12">
                           <table id="userlisting" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr><th>Sr. No</th>
                   <th>First Namne</th>
                    <th>Last Namne</th>
                    <th>Email</th>
                    <th>Use Role</th> 
                    <th>Action</th>   
                   </tr>
                  </thead>
                  <tbody>
                     
                  <?php
            if(!empty($records)) {
            $i = $page;      
            foreach($records as $key=>$record) {   
            ?>
            <tr>
                <td><?php echo ++$i;?></td>
                <td><?php echo $record->first_name; ?></td>
                <td><?php echo $record->last_name; ?></td>  
                <td><?php echo $record->email; ?></td>
                <td><?php echo $record->user_role; ?></td>  
                <td><a href="<?php echo base_url("user/add_edit/".$record->id)?>">Edit</a> |<a href="#" class="delete-record" id="<?php echo $record->id;?>">Delete</a>  </td>  
                
            
                
            </tr>
            
            <?php }  }else { echo '<td colspan="7" align="center">No Data Found</td>'; }?>
                
                 </tbody>
                  
                </table></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>   
 
 
  
   
    
<script src="<?php echo base_url(ASSETS)?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(ASSETS)?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>   
<script>
   $(document).ready( function () {
    $('#userlisting').DataTable();
} );
</script>       

<script type="text/javascript">
   
 
    
    $(".delete-record").click(function(){
        let row_id = $(this).attr("id");
        if(confirm('Are you sure to remove this user ?'))
        {
            $.ajax({
               url: "<?php echo base_url("user/delete_row")?>",
               type: 'post',
               dataType:"json", 
               data:{row_id:row_id}, 
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                   console.log(data);
                    alert("Record removed successfully"); 
                    window.location.reload();  
               }
            });
        }
    });
</script>
  

