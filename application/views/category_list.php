<div class="content-wrapper"> 
 
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $heading;?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     
     
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                
                        <div class="row">
                            <div class="col-sm-12">
                           <table id="tblCategoryListing" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Sr. No</th>
                   <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Category Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Description</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Indate</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Action</th>  
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
                <td><?php echo $record->name; ?></td>
                <td><?php echo $record->description; ?></td>  
                <td><?php echo $record->indate; ?></td> 
                <td><a href="<?php echo base_url("product/add_edit_category/".$record->id)?>">Edit</a> |
                 <a href="#" class="delete-record" id="<?php echo $record->id;?>">Delete</a>  </td>  
                 
            </tr>
            
            <?php }  }?> 
            
                
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
    $('#tblCategoryListing').DataTable();
} );
</script>   
 
 
<script type="text/javascript">
    $(".delete-record").click(function(){
        let row_id = $(this).attr("id");
        if(confirm('Are you sure to remove this category, if you deletes this category, all the products related to that category will be deleted. ?'))
        {
            $.ajax({
               url: "<?php echo base_url("product/delete_category")?>",
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
  
 
