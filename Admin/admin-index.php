 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
  <!-- php starts here -->
  
<!---------------- Session Ends form here ------------------------>
<title>Admin - ICBS</title>
<style>
i.icon-2x {
  font-size: 30px;
}

.color-light{
    color:#FFFFFF;
}

/*Colored Content Boxes
------------------------------------*/
.servive-block {
  padding: 20px 30px;
  text-align: center;
  margin-bottom: 20px;
}

.servive-block p,
.servive-block h2 {
  color: #fff;
}

.servive-block h2 a:hover{
  text-decoration: none;
}

.servive-block-light,
.servive-block-default {
  background: #fafafa;
  border: solid 1px #eee; 
}

.servive-block-default:hover {
  box-shadow: 0 0 8px #eee;
}

.servive-block-light p,
.servive-block-light h2,
.servive-block-default p,
.servive-block-default h2 {
  color: #555;
}

.servive-block-u {
  background: #72c02c;
}
.servive-block-blue {
  background: #3498db;
}
.servive-block-red {
  background: #e74c3c;
}
.servive-block-sea {
  background: #1abc9c;
}
.servive-block-grey {
  background: #95a5a6;
}
.servive-block-yellow {
  background: #f1c40f;
}
.servive-block-orange {
  background: #e67e22;
}
.servive-block-green {
  background: #2ecc71;
}
.servive-block-purple {
  background: #9b6bcc;
}
.servive-block-aqua {
  background: #27d7e7;
}
.servive-block-brown {
  background: #9c8061;
}
.servive-block-dark-blue {
  background: #4765a0;
}
.servive-block-light-green {
  background: #79d5b3;
}
.servive-block-dark {
  background: #555;
}
.servive-block-light {
  background: #ecf0f1;
}

</style>
<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>  
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100 page-content-index">
			<div class="flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<h4>Admin Dashboard </h4>
			</div>
<div class="container bootstrap snippets bootdey">
    <div class="row margin-bottom-10">
        <div class="col-sm-6">
            <div class="servive-block servive-block-purple">
                <i class="icon-2x color-light fa fa-graduation-cap"></i>
                <h2 class="heading-md">Total Students</h2>
                <?php
                  $sql = "select * from student_information";
                  $run = mysqli_query($con,$sql);
                  $count = mysqli_num_rows($run);
                  echo "<h1 class='text-white fs-1'>$count</h1>";
                ?>
			</div>
        </div>
		<div class="col-sm-6">
			<div class="servive-block servive-block-purple">
				<i class="icon-2x color-light fa fa-graduation-cap"></i>
                <h2 class="heading-md">Total Staffs</h2>
                <?php
                  $sql = "select * from teacher_information";
                  $run = mysqli_query($con,$sql);
                  $count = mysqli_num_rows($run);
                  echo "<h1 class='text-white fs-1'>$count</h1>";
                ?>
            </div>
        </div>
		<div class="col-sm-6">
			<div class="servive-block servive-block-purple">
				<i class="icon-2x color-light fa fa-globe"></i>
                <h2 class="heading-md">Total Courses</h2>
                <?php
                  $sql = "select * from courses";
                  $run = mysqli_query($con,$sql);
                  $count = mysqli_num_rows($run);
                  echo "<h1 class='text-white fs-1'>$count</h1>";
                ?>
            </div>
        </div>
		<div class="col-sm-6">
			<div class="servive-block servive-block-purple">
				<i class="icon-2x color-light fa fa-book"></i>
                <h2 class="heading-md">Total Subjects</h2>
                <?php
                  $sql = "select * from course_subjects";
                  $run = mysqli_query($con,$sql);
                  $count = mysqli_num_rows($run);
                  echo "<h1 class='text-white fs-1'>$count</h1>";
                ?>
              </div>
        </div>
    </div>
</div>
		
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>