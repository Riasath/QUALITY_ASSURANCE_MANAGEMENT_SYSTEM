<!DOCTYPE HTML>
<head>
<head>

     <link href="css/bootstrap.css" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
     
</head>



<body>
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
                <div class="well">
                    
                    <center><h2>IQACMS From Submission Details</center>
                </div>
            </div>
        </div>
    </div>



    <div class ="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">

        <h3>You successfully Submit <?php echo $UserSemesterName; echo $UserYearName;

        ?>
         iqac From.



        </h3>

        <h3>Please Logout</h3>


         </div>
         
</div>



<div class ="navbar navbar-default navbar-fixed-bottom">

<div class ="row">
    <div class="span12">
        <div class="well">
            <div class="container">
            <br><a href="<?php echo base_url('login/logout') ?>" role="button" class="btn btn-primary btn-large">Sign out</a> &nbsp;
            <a href="user/help" role="button" class="btn btn-warning btn-large">Help Line</a></br>
            
        </div>
        </div>
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