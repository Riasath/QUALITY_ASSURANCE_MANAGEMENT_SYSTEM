<!DOCTYPE HTML>
<head>
<head>

     <link href="css/bootstrap.css" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
         <link href="<?php echo base_url('assets/css/mystyle.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>">
</script>
     
</head>



<body background="<?php echo base_url('assets/img/school.png') ?>">
    <div class ="container">
          <div class="page-header">
          <div class="row">
            <div class="col-md-2">
              <img src="<?php echo base_url('assets/img/logo.png') ?>" style="width:100px;height:100px;">    
            </div>
            <div class="col-md-10">
              <h1> Quality Assurance  Management System</h1>
              <h4> A green tecnology for smart people</h4>
            </div>
          </div>
          
        

      </div>
        <div class="row">
            <div class ="span12">
                <div class="panel panel-success">
                    
                    <center><h4>IQACMS LOGIN PANEL</center>
                </div>
            </div>
        </div>
    </div>
	
<div class ="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <form method="post" action="<?php echo base_url('login/LoginValidation') ?>">
                <div class="form-group">
                    <label>User Email :</label>
                    <input type="text" name="name" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>


              <div class="ww"><label>Select Type :</label>

              <select id="dropDown" name="UserTypeId" class="form-control w_con">
              
              
                            <?php
                            foreach ($LoadType->result() as $row) {
                                  $TypeName = $row->Name;
                                  $TypeID = $row->UserTypeId;
                                  ?>
                                  
                                  <option value="<?php echo $TypeID;?>"><?php echo $TypeName ?></option>      
              
                                <?php
                                
                               
                                
                            } ?>
              
                            </select></div>
              


              <div class="ww"><label>Select Semester:</label>

              <select name="SemesterId" class="form-control w_con">


              <?php
              foreach ($LoadSemester->result() as $row) {
                    $Name = $row->Name;
                    $semID = $row->SemesterId;
                    ?>

                    <option value="<?php echo $semID ?>"><?php echo $Name ?></option>      

                  <?php } ?>

              </select></div>




              <div class="ww"><label>Select Year:</label>

              <select name="YearId" class="form-control w_con">


              <?php
              foreach ($Loadyear->result() as $row) {
                    $Name = $row->Name;
                    $yearID = $row->YearId;
                    ?>

                    <option value="<?php echo $yearID ?>"><?php echo $Name ?></option>      

                  <?php } ?>

              </select></div>
              


              <div id="2" class="drop-down-show-hide" class="win50"><label>Select Depertment :</label>

              <select name="DepertmentId" class="form-control w_con">


              <?php
              foreach ($LoadDepertment->result() as $row) {
                    $Name = $row->Name;
                    $DeptId = $row->DepertmentId;
                    ?>

                    <option value="<?php echo $DeptId ?>"><?php echo $Name ?></option>      

                  <?php } ?>

              </select></div>
              



            <div id="3" class="drop-down-show-hide" class="win50"><label>Select Faculty :</label>

              <select name="FacultyId" class="form-control w_con">


              <?php
              foreach ($LoadFaculty->result() as $row) {
                    $Name = $row->Name;
                    $DeptId = $row->FacultyId;
                    ?>

                    <option value="<?php echo $DeptId ?>"><?php echo $Name ?></option>      

                  <?php } ?>

              </select></div>


             <div class="www">
                <button id="submit" class ="btn btn-success" >Login</button>
             </div>  
            </form>
            <br>
            <?php if($this->session->flashdata('login_failed')) : ?>
            <?php echo '<p class="alert alert-danger" role="alert">' .$this->session->flashdata('login_failed') . '</p>'; ?>
            <?php endif; ?>
            
            
            
		
    </div>
         
</div>

<script> 
$('.drop-down-show-hide').hide();

$('#dropDown').change(function () {
    $('.drop-down-show-hide').hide()    
    $('#' + this.value).show();
  

});


</script>

<div class ="navbar navbar-default">

<div class ="row">
    <div class="span12">
        <center class = "justcause"><label>CopyRight 2016 CSE Depertment,Developed By Md Riasath Arif Prodhan and His Team</label></center>
    </div>
</div>
</div>
</div>
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <style type="text/css">
    .ww{
      width: 25%;
      float:left;
      font-size: 90%;
      margin: 0 2% 20px 0;

    }
    .w{
      margin-right: 0;
    }
    .www{
      width: 25%;
      float:right;
      font-size: 90%;
      margin: 20% 2% 20px 0;
    }
    .win50{
      width: 50%;
      float:left;
      font-size: 90%;
      margin: 0 2% 20px 0;

    }
  </style>
</body>
</html>