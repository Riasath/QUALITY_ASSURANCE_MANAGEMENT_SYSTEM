<!DOCTYPE HTML>
<head>
<head>

     <link href="css/bootstrap.css" rel="stylesheet">

     <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
     
     <h1>
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
                    
                    <center><h2>IQACMS Teachers IQAC FORM</center>
                </div>
            </div>
        </div>
    </div>
     </h1>
</head>


<body  background="<?php echo base_url('assets/img/school.png') ?>">
<div class ="container">
        <div class="row">
            <div class ="span12">
                <div class="panel panel-success">
<?php echo form_open_multipart('Teacher/Store/'.$value); ?>
<table class="table table-striped">
<tr>
  <td class="info">
  	Course Name : <?php

                            foreach ($iqacFormDetails->result() as $row) {
                                  $CourseName = $row->Tittle;
                                  $SectionName = $row->SectionName;
                                  
                                  echo $CourseName;
                                  
								
              					 
                                
                               
                                
                            




  	?>
  </td>
  <td class="info">
  	Section : <?php
  	echo $SectionName;
  }
  	?>
  </td>
  <td class="info">

		<div><label>Course Outline Given :</label>

              <select name="CourseOutline" class="form-control w_con">
              
 
                    <option value="Yes">Yes</option> 
                    <option value="No">No</option>      
              
               </select></div>



  
  </td>
  </tr>




  <tr>
  
  <td class="info">
  	<div class="form-group">
    <label for="exampleInputEmail1">Google Classroom Link</label>
    <input type="Name" class="form-control" placeholder="classroom.google.com" <?php echo form_input('GoogleClassrooms'); ?> 
  </div>
  </td>
  <td class="info">
  	<div class="form-group">
    <label for="exampleInputEmail1">Number Of Class Taken:</label>
    <input type="Name" class="form-control" id="Classtaken" placeholder="24"<?php echo form_input('NumberOfClasses'); ?> 
  </div>
  </td>
  <td class="info">

		<div><label>Number Of Class Test Taken:</label>

              <select name="ClassTest" class="form-control w_con">
              
 
                    <option value="2">2</option> 
                    <option value="3">3</option>
                     <option value="4">4</option>  
                      <option value="5">5</option>  
                       <option value="6">6</option>        
              
               </select></div>



  
  </td>
  </tr>






<tr>
  
  <td class="info">

		<div><label>Mid Term Exam Taken:</label>

              <select name="MidTermExamTaken" class="form-control w_con">
              
 
                    <option value="Yes">Yes</option> 
                    <option value="No">No</option>      
              
               </select></div>



  
  </td>
 <td class="info">

		<div><label>Final Term Exam Taken:</label>

              <select name="FinalTermExamTaken" class="form-control w_con">
              
 
                    <option value="Yes">Yes</option> 
                    <option value="No">No</option>      
              
               </select></div>



  
  </td>
  <td class="info">

		<div><label>Number Of Assignmanet:</label>

              <select name="Assignment" class="form-control w_con">
              
 
                    <option value="2">2</option> 
                    <option value="3">3</option> 
                     <option value="4">4</option> 
                    <option value="5">5</option>    
                     <option value="More">More</option>      
              
               </select></div>



  
  </td>
  </tr>




  <tr>
  
  <td class="info">
  	


  </td>
 
<td class="info">

		<div><label>Number Of Presentation:</label>

              <select name="Presentation" class="form-control w_con">
              
 
                    <option value="2">2</option> 
                    <option value="3">3</option> 
                     <option value="4">4</option> 
                    <option value="5">5</option>    
                     <option value="More">More</option>      
              
               </select></div>



  
  </td>
  <td class="info">
    

    
  </td>
  </tr>




    <tr>
  
  <td class="info">
  	<div class="form-group">
    <label for="exampleInputEmail1">Attandence</label>
    <?php echo form_upload('Attandence'); ?>
  </div>
  </td>
  <td class="info">
    <div class="form-group">
    <label for="exampleInputEmail1">Mid Term Exam Question</label>
    <?php echo form_upload('MidTermExam'); ?>
  </div>
  </td>

 <td class="info">
    <div class="form-group">
    <label for="exampleInputEmail1">Final Exam Question</label>
    <?php echo form_upload('FinalTermExam'); ?>
  </div>
  </td>
  
  </tr>
  <tr>
    <td class="info">
    

    
  </td>
 
  <td class="info">
    
<button type="submit" class="btn btn-default"><?php echo form_submit('submit', 'Submited', 'class="btn btn-primary"'); ?></button>
    
  </td>
  
  <td class="info">
    

    
  </td>
  



  </tr>



</table>
 
</form>
 </div>
            </div>
        </div>
    </div>
</body>




<div class ="navbar navbar-default navbar">

<div class="container">
            <br><a href="<?php echo base_url('Teacher/LoadTeacherData') ?>" role="button" class="btn btn-primary btn-large justcause">Back</a> &nbsp;
            <a href="<?php echo base_url('Login/logout') ?>" role="button" class="btn btn-primary btn-large justcause">Sign out</a> &nbsp;
            <a href="user/help" role="button" class="btn btn-warning btn-large">Help Line</a></br>
           
        </div>
</div>
</div>
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>