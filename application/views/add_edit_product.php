<?php 
    $name = $description = $price = $id =  $category_id = $image =  "";
    if(!empty($row)) {
        $id              = $row->id; 
        $name            = $row->name;
        $description     = $row->description;
        $price           = $row->price;
        $image           = $row->image;
        $category_id     = $row->category_id;   
    }
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
          <form name="product-form" id="product-form" action="<?php echo base_url('product/save');?>" method="post" enctype="multipart/form-data"> 
           <div class="row">
              
            <div class="col-md-6">
                <div class="form-group">
                <label for="name">Produt Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Produc Name" value="<?php echo $name; ?>"  />
             <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
         </div>
            </div> 
             <div class="col-md-6">
                <div class="form-group">
                <label for="description">Description</label>
            <textarea class="form-control" id="descriotion" name="description" placeholder="Description" ><?php echo $description;?></textarea>
             
                </div>
            </div>
             
            <div class="col-md-6">
                <div class="form-group">
                <label for="price">Price</label>
            <input type="number"  class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $price; ?>" >
        
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                <label for="year">Category</label>   
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Category</option>
                    <?php foreach($category_records as $cate_row) {

                        ?>
                        <option value="<?php echo $cate_row->id;?>" <?php echo ($cate_row->id == $category_id ) ? 'selected' : '';  ?> ><?php echo $cate_row->name;?></option>
                    <?php } ?> 
                </select></div>
            </div> 
             
            <div class="col-md-12">
                <div class="form-group">
                <label for="image">Image (Maxsize:2mb,Allowed file type: jpeg, jpg, png )</label>
            <input type="file"  class="form-control" id="image" name="image"  value="<?php echo $price; ?>" >
            <input type="hidden" name="old_image" id="old_image" value="<?php echo $image; ?>"> 
         </div>
            </div> 
             
             
            <div class="col-md-6">
                <div class="form-group">
                <button type="submit" class="btn btn-primary"><?php echo (empty($id)) ? "Add Prodduct" : "Update Product";?></button></div>
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
              
      
      
  <!------------------------------>    
 
  
  
   
   

<script src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>
<script>   

    $("#product-form").validate({
        rules:{
             name:{
                  required:true
             },
             description:{
                  required:true
             },
             price:{
                  required:true,
                  digits:true 
             },
             category_id:{
                  required:true
             },
             image:{
                required: function () {
                return $('#id').val().length == 0;;
                } 
             }         
        },
        messages:{
            name:{
                 required:"Please enter product name"
            },
            description:{
                 required:"Please enter description"
            },
            price:{
                 required:"Please enter price",
                 digit: "Please enter number only"  
            },   
            category_id:{
                 required:"Please select category"
            },
            image:{
                 required:"Please choose a image"
            }         
        },
        submitHandler : function(form) {
                form.submit();
        }    
     }); 
      
    

</script> 
  

