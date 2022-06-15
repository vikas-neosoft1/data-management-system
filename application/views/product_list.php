<div class="content-wrapper"> 
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $heading;?></h1>
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
                <div class="row">
                      <div class="col-sm-12">
                          <table id="tblProductListing" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                  <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" >Sr. No</th>
                   <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Product Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Description</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Price</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Category</th> 
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Indate</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" >Image</th>  
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
                <td><?php echo $record->price; ?></td> 
                <td><?php echo $record->category_name; ?></td>   
                <td><?php echo $record->indate; ?></td>   
                <td><a href="<?php echo base_url("products_images/".$record->image)?>" target="_blank"><img src="<?php echo base_url("products_images/".$record->image)?>" height="150"/></a></td>   
                
                <td><a href="<?php echo base_url("product/add_edit/".$record->id)?>">Edit</a> |
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
    $('#tblProductListing').DataTable();
} );
</script>  
          

<script type="text/javascript">
    $(".delete-record").click(function(){
        let row_id = $(this).attr("id");
        if(confirm('Are you sure to remove this product?'))
        {
            $.ajax({
               url: "<?php echo base_url("product/delete_product")?>",
               type: 'post',
               dataType:"json", 
               data:{row_id:row_id}, 
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    window.location.href = "<?php echo base_url("product")?>";  
               }
            });
        }
    });
</script>
  
 
