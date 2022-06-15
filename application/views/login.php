
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS)?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS)?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS)?>dist/css/adminlte.min.css">
  <style>.error{color:red;}</style> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url("home");?>"><b>Data Management System</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if($this->session->flashdata('success')) { ?>
        <span class="text-success"><?php echo $this->session->flashdata('success'); ?></sapn> 
    <?php } ?>
    
    <?php if($this->session->flashdata('error')) { ?>
        <span class="text-danger"><?php echo $this->session->flashdata('error'); ?></sapn> 
    <?php } ?>   

      <form action="<?php echo base_url("login/dologin");?>" id="login-form"  method="post">
        <div class="form-group mb-3">
          <input type="email" id="email" name="email" class="form-control" placeholder="Email">
          
          
        </div>
        <div class="form-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(ASSETS)?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(ASSETS)?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(ASSETS)?>dist/js/adminlte.min.js"></script>
</body>
</html>


    
<script src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>
<script>
    
      
    $(document).ready(function(){ 
        $("#login-form").validate({
            rules:{
                email:{
                    required:true,
                    email:true 
                },
                password:{
                    required: true
            }             
            },
            messages:{
                email:{
                    required:"Please enter email",
                    email:"Please enter valid email" 
                },
                password:{
                    required:"Please enter password"
                }    
            
            },
            submitHandler : function(form) {
            form.submit();
            }    
        }); 
        
        }); 

</script> 
  
 

</body>
</html>
