<?php 
    $first_name = $last_name = $email = $role =  $id = "";
    $req_skills = [];
      
    if(!empty($row)) {
        $id                 = $row->id; 
        $first_name         = $row->first_name;
        $last_name          = $row->last_name;
        $email              = $row->email;
        $role               = $row->role; 
          
        
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
          <form name="user-form" id="user-form" action="<?php echo base_url('user/save');?>" method="post">    
            <div class="row">
              
            <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>"  />
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                </div>
            </div> 
             <div class="col-md-6">
                <div class="form-group">
                <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>"  />
             
                </div>
            </div>
             
            <div class="col-md-6">
                <div class="form-group">
                <label for="email">Email</label>
            <input type="email"  class="form-control" id="email" name="email" placeholder="Email " value="<?php echo $email; ?>" >
        
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                <label for="year">Role</label>   
                <select class="form-control" name="role" id="role">
                    <option value="">Role</option>
                    <?php foreach($roles as $user_role) {

                        ?>
                        <option value="<?php echo $user_role->id;?>" <?php echo ($user_role->id == $role ) ? 'selected' : '';  ?> ><?php echo $user_role->role;?></option>
                    <?php } ?> 
                </select></div>
            </div> 
             
            <div class="col-md-6">
                <div class="form-group">
                        
                  <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
         </div>
            </div> 
             <div class="col-md-6">
                <div class="form-group">
                <label for="password">Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
            </div>
             
            <div class="col-md-6">
                <div class="form-group">
                <button type="submit" class="btn btn-primary"><?php echo (empty($id)) ? "Submit" : "Update";?></button>
            
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
             first_name:{
                  required:true
             },
             last_name:{
                  required:true
             },
             email:{
                  required:true,
                  email:true 
             },
             role:{
                  required:true
             },
             
            password:{
                required: function () {
                return $('#id').val().length == 0;;
            },
            minlength: 8
            },
            confirm_password:{
                required: function () {
                return $('#id').val().length == 0;;
            },
                equalTo: "#password",
                minlength: 8       
            }           
        },
        messages:{
            first_name:{
                 required:"Please enter first_name"
            },
            last_name:{
                 required:"Please enter last name"
            },
            email:{
                 required:"Please enter email",
                 email: "Please enter valid email" 
            },   
            role:{
                 required:"Please select role"
            }, 
            password:{
                 required       :  "Please enter password",
                 minlength     :  "Password mnin length should be 8 characters"     
            },
            confirm_password:{
                 required  : "Please enter confirmn password",
                 equalTo   : "Password and confirm password should be same" 
            }        
        },
        submitHandler : function(form) {
                form.submit();
        }    
     }); 
      
    

</script> 
 

