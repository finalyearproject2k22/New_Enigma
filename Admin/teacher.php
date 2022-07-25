<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION['LoginTeacher']="";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

		$teacher_id = $_POST["teacher_id"];

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];

 		$last_name=$_POST["last_name"];
 		
 		$email=$_POST["email"];
 		
 		$phone_no=$_POST["phone_no"];
 		
 		$other_phone=$_POST["other_phone"];

 		$teacher_status=$_POST["teacher_status"];
 		
 		$dob=$_POST["dob"];

		$qualification = $_POST["qualification"];

		$teach_experience = $_POST["teach_exp"];

 		$Hire_date=$_POST["dos"];
 		
 		$gender=$_POST["gender"];
 		 		
 		$current_address=$_POST["current_address"];

		$city = $_POST["city"];
 		 		 		 		
 		$date=date("d-m-y");

 		$password=$_POST['password'];

 		$role=$_POST['role'];

		
// *****************************************Images upload code starts here********************************************************** 
 		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

 		$resume = $_FILES['resume']['name'];$tmp_name=$_FILES['resume']['tmp_name'];$path = "teacher_resume/".$resume;move_uploaded_file($tmp_name, $path);

 		$qualification_certificate = $_FILES['qua_cer']['name'];$tmp_name=$_FILES['qua_cer']['tmp_name'];$path = "images/".$qualification_certificate;move_uploaded_file($tmp_name, $path);

		$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		
// *****************************************Images upload code end here********************************************************** 


 		$query="INSERT INTO `teacher_information`(`teacher_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_no`, `alternate_mobile_no`, `date_of_birth`, `gender`, `address`, `city`, `qualification`, `experience`, `hire_date`, `status`, `profile_image`, `resume`, `matric_certificate`, `qualification_certificate`,`date`) VALUES('$teacher_id','$first_name','$middle_name','$last_name','$email','$phone_no','$other_phone','$dob','$gender','$current_address','$city','$qualification','$teach_experience','$Hire_date','$teacher_status','$profile_image','$resume','$matric_certificate','$qualification_certificate','$date')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			// echo "Your Data has been submitted";
			echo '<script>alert("Your Data has been submitted")</script>';
			}
			else {
			echo '<script>alert("Data not submitted")</script>';	
 		}
 		$query2="insert into login(user_id,Password,Role)values('$email','$password','$role')";
 		// $run2=mysqli_query($con, $query2);
 		// if ($run2) {
 		// 	echo "Your Data has been submitted into login";
 		// }
 		// else {
 		// 	echo "Your Data has not been submitted into login";
 		// }
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$teacher_id=$_POST['teacher_id'];

		$subject_code=$_POST['subject_code'];

		$total_classes=$_POST['total_classes'];

		$date=date("d-m-y");

		$query3="insert into teacher_courses(course_code,semester,teacher_id,subject_code,assign_date,total_classes)values('$course_code','$semester','$teacher_id','$subject_code','$date','$total_classes')";

		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Teacher</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Teacher Registration</h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Teacher</button><br><br>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add New Teacher</h4>
									</div>
									<div class="modal-body">
										<form action="teacher.php" method="post" enctype="multipart/form-data">
											<div class="row mt-3">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">First Name: </label>
														<input type="text" name="first_name" class="form-control" required="" placeholder="First Name">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Middle Name: </label>
														<input type="text" name="middle_name" class="form-control" required="" placeholder="Middle Name">
													</div>
												</div><div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Last Name: </label>
														<input type="text" name="last_name" class="form-control" required="" placeholder="Last Name">
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Teacher ID:</label>
														<input type="text" name="teacher_id" placeholder="Teacher ID" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Teacher Email:</label>
														<input type="text" name="email" class="form-control" required="" placeholder="Enter Email">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Mobile No:</label>
														<input type="number" name="phone_no" class="form-control"placeholder="Enter Mobile Number">
													</div>
												</div>
											</div>
												
											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Alternate No:</label>
														<input type="number" name="other_phone" class="form-control" placeholder="Other Phone No">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Date of Birth: </label>
														<input type="date" name="dob" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Gender:</label>
														<select class="browser-default custom-select" name="gender">
															<option selected>Select Gender</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Home Address:</label>
														<input type="text" name="current_address" class="form-control" placeholder="Enter Current Address">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Native City:</label>
														<input type="text" name="city" class="form-control" placeholder="Your Native City">
													</div>
												</div>
	
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Qualification: </label>
														<select class="browser-default custom-select" name="qualification">
															<option selected value="B.E">B.E</option>
															<option value="B.Ed">B.Ed</option>
															<option value="B.A">B.A</option>
															<option value="B.Com">B.Com</option>
															<option value="Diploma">Diploma</option>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Teaching Experience(in Yrs): </label>
														<select class="browser-default custom-select" name="teach_exp">
															<option selected value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6>">6</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Hire Date:</label>
														<input type="text" readonly id="currentdate" name="dos" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Teacher Status: </label>
														<select class="browser-default custom-select" name="teacher_status">
															<option selected>Select Status</option>
															<option value="Permanent">Permanent</option>
															<option value="Contract">Contract</option>
														</select>
													</div>
												</div>
											</div>
											

											<div class="row">
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Image</label>
														<input type="file" name="profile_image" class="form-control">
													</div>
												</div>
												
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Upload Resume</label>
														<input type="file" name="resume" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Matric Certificate</label>
														<input type="file" name="matric_certificate" class="form-control">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-4">
													<div class="formp">
														<label for="exampleInputPassword1">Qualification Certificate</label>
														<input type="file" name="qua_cer" class="form-control">
													</div>
												</div>
											</div>
											
											<!-- _________________________________________________________________________________
																				Hidden Values are here
											_________________________________________________________________________________ -->
											<div>
												<input type="hidden" name="password" value="teacher123*">
												<input type="hidden" name="role" value="Teacher">
											</div>
											<!-- _________________________________________________________________________________
																				Hidden Values are end here
											_________________________________________________________________________________ -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row w-100">
					<div class="col-md-12 ml-2">
						<section class="mt-3">
							
							<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Teacher ID</th>
									<th>Teacher Name</th>
									<th>Current Address</th>
									<th>Hire Date</th>
									<th>Email</th>
									<th>Image</th>
									<th>Operation</th>
								</tr>
								<?php 
								$query="select teacher_id,first_name,middle_name,last_name,address,matric_certificate,Hire_date,email,profile_image from teacher_information";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["teacher_id"] ?></td>
										<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
										<td><?php echo $row["address"] ?></td>
										<td><?php echo $row["Hire_date"] ?></td>
										<td><?php echo $row["email"] ?></td>
										<td><?php  $profile_image= $row["profile_image"] ?>
										<img height='50px' width='50px' src=<?php echo "images/$profile_image"  ?> >
										</td>
										<td width=''> 
											<?php 
												echo "<a class='btn btn-danger' href=delete-function.php?teacher_id=".$row['teacher_id'].">Delete</a> "
											?>
										</td>
									</tr>
								<?php }
								?>
							</table>				
						</section>
					</div>
				</div>	 	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../date.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


