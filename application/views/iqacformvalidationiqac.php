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
                    
                    <center><h2>IQACMS Teachers IQAC FORM Validation</center>
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

<table class="table table-striped">
<tr>
  <td class="info">
  	Course Name : <?php

                            foreach ($iqacFormDetails->result() as $row) {
                                  $CourseName = $row->Tittle;
                                  $CourseOutline = $row->CourseOutline;
                                  $ClassTaken = $row->ClassTaken;
                                  $ClassTest = $row->ClassTest;
                                  $PresentationTaken = $row->PresentationTaken;
                                  $AssignmentTaken = $row->AssignmentTaken;
                                  $SectionName = $row->CourseCovered;
                                  $FinalTermExamTaken = $row->FinalTermExamTaken;
                                  $MidTermExamTaken = $row->MidTermExamTaken;
                                  $GoogleClassroom = $row->GoogleClassroom;
                                  $Attaindence = $row->Attaindence;
                                  $FinalQuestion = $row->FinalQuestion;
                                  $MidQuestion = $row->MidQuestion;
                                  $SectionName = $row->SectionName;
                                  $userid = $row->UserId;
                                  
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

		<div><label>Course Outline Given : <?php echo $CourseOutline ?></label>

             



  
  </td>
  </tr>




  <tr>
  
  <td class="info">
  	<div class="form-group">
    <label for="exampleInputEmail1">Google Classroom Link : <?php echo $GoogleClassroom ?></label>
     
  </div>
  </td>
  <td class="info">
  	<div class="form-group">
    <label >Number Of Class Taken: <?php echo $ClassTaken ?> </label>
    
  </div>
  </td>
  <td class="info">

		<div><label>Number Of Class Test Taken: <?php echo $ClassTest ?></label>



  
  </td>
  </tr>






<tr>
  
  <td class="info">

		<div><label>Mid Term Exam Taken: <?php echo $MidTermExamTaken ?></label>

  </td>
 <td class="info">

		<div><label>Final Term Exam Taken: <?php echo $FinalTermExamTaken ?></label>

              



  
  </td>
  <td class="info">

		<div><label>Number Of Assignmanet: <?php echo $AssignmentTaken ?></label>

            



  
  </td>
  </tr>




  <tr>
  
  <td class="info">
  	


  </td>
 
<td class="info">

		<div><label>Number Of Presentation: <?php echo $PresentationTaken ?></label>

              



  
  </td>
  <td class="info">
    

    
  </td>
  </tr>




    <tr>
  
  <td class="info">
  	

    <?php

      $test = base_url()."Head/AttaindenceDownload/".$Attaindence;

    ?>
    
    <label >Attaindence: <a href"<?php

     echo $test ?>"> View Attandence </a> </label>
  
  </div>
  </td>
  <td class="info">
   <?php

      $test = base_url()."Head/AttaindenceDownload/".$FinalQuestion;

    ?>
    
    <label >FinalQuestion: <a href"<?php

     echo $test ?>"> View FinalQuestion </a> </label>
  </td>

 <td class="info">
   <?php

      $test = base_url()."Head/AttaindenceDownload/".$MidQuestion;

    ?>
    
    <label >MidQuestion: <a href"<?php

     echo $test ?>"> View MidQuestion </a> </label>
  </td>
  
  </tr>
  <tr>
    <td class="info">
    

    
  </td>
 
  <td class="info">
    

    
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




<div class ="navbar navbar navbar-fixed-bottom">

<div class="container">
            <br><a href="<?php echo base_url('Iqac/LoadTeacherData/'.$userid) ?>" role="button" class="btn btn-primary btn-large justcause">Back</a> &nbsp;
            <a href="logout" role="button" class="btn btn-primary btn-large">Sign out</a> &nbsp;
            <a href="user/help" role="button" class="btn btn-warning btn-large">Help Line</a></br>
           
        </div>
</div>
</div>
	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>