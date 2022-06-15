<?php 
    $name = $description  =  $id =  "";
    $req_skills = [];
      
    if(!empty($row)) {
        $id           = $row->id; 
        $name         = $row->name;
        $description  = $row->description;
          
        
    }
    //print_r($this->session->userdata());echo "<br>";
   // echo $this->session->userdata("id"); 
    ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $heading;?></h1>
            <?php if($this->session->flashdata('success')) { ?>
        <span class="text-success"><?php echo $this->session->flashdata('success'); ?></sapn> 
    <?php } ?>
    
    <?php if($this->session->flashdata('error')) { ?>
        <span class="text-danger"><?php echo $this->session->flashdata('error'); ?></sapn> 
    <?php } ?>   
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
          <form name="user-form" id="user-form" action="<?php echo base_url('product/save_category');?>" method="post">   
            <div class="row">
              
            <div class="col-md-6">
                <div class="form-group">
                  
                  <label for="first_name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" value="<?php echo $name; ?>"  />
             <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                </div>
            </div> 
             <div class="col-md-6">
                <div class="form-group">
                <label for="last_name">Category Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Category description" value="<?php echo $description; ?>" ><?php echo $description; ?></textarea>
                </div>
            </div>
             
            <div class="col-md-6">
                <div class="form-group">
                <button type="submit" class="btn btn-primary"><?php echo (empty($id)) ? "Add Category" : "Update Category";?></button>
            </div>
            </div>   
          
            </div>
            <!-- /.row -->
        </form> 
          </div>
          <!-- /.card-body -->
          
        </div>
       

        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
  
   
    
     
<script src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>
<script>   

    $("#user-form").validate({
        rules:{
             name:{
                  required:true
             },
             description:{
                  required:true
             }       
        },
        messages:{
            name:{
                 required:"Please enter category name"
            },
            description:{
                 required:"Please enter category description"
            }       
        },
        submitHandler : function(form) {
                form.submit();
        }    
     }); 
      
    

</script> 
  
 

