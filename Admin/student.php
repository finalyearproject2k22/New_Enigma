<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];
 		
 		$last_name=$_POST["last_name"];
 		 		
 		$email=$_POST["email"];
 		
 		$mobile_no=$_POST["mobile_no"];

 		$mobile_no_2=$_POST["mobile_no_2"];

 		$course_code=$_POST['course_code'];
 		
 		$applicant_status=$_POST["applicant_status"];
 		
 		$application_status=$_POST["application_status"];
 		 		
 		$dob=$_POST["dob"];

		$city = $_POST["city"];

		$pincode = $_POST["pin"];
		
		$caste = $_POST["caste"];

		$subcaste = $_POST["sub_caste"];

 		$gender=$_POST["gender"];

		$register_no = $_POST["reg_no"];

		$dos = $_POST["dos"];

		$nationality = $_POST["nationality"];

		$sslc_per = $_POST["sslc_per"];

		$home_address=$_POST["current_address"];
 		 		
 		$place_of_birth=$_POST["place_of_birth"];
 		
		$mother_tongue=$_POST["m_tongue"];

 		$sslc_complition_date=$_POST["matric_complition_date"];
 		
 		$sslc_attempt=$_POST["matric_attempts"];

 		$password=$_POST['password'];

 		$role=$_POST['role'];

 		

// *****************************************Images upload code starts here********************************************************** 
		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

// *****************************************Images upload code end here********************************************************** 

 		$query="INSERT INTO `student_information`(`register_no`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_no`, `mobile_no_2`, `course`, `applicant_status`, `application_status`, `dob`, `native_city`, `pincode`, `caste`, `subcaste`, `gender`, `date_of_submission`, `nationality`, `sslc_percentage`, `home_address`, `place_of_birth`, `mother_tongue`, `sslc_complition_date`, `sslc_attempt`, `profile_image`, `matric_certificate`) VALUES ('$register_no','$first_name','$middle_name','$last_name','$email','$mobile_no','$mobile_no_2','$course_code','$applicant_status','$application_status','$dob','$city','$pincode','$caste','$subcaste','$gender','$dos','$nationality','$sslc_per','$home_address','$place_of_birth','$mother_tongue','$sslc_complition_date','$sslc_attempt','$profile_image','$matric_certificate')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 		$query2="insert into login(user_id,Password,Role)values('$register_no','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			echo "Your Data has been submitted into login";
 		}
 		else {
 			echo "Your Data has not been submitted into login";
 		}
 	}
?>

<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 
<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Student</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Student Registration </h4>
					</div>
				</div>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button><br><br>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">Add New Student</h4>
						        </div>
							    <div class="modal-body">
							        <form action="student.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Student First Name:*</label>
											        <input type="text" name="first_name" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Student Middle Name:</label>
												    <input type="text" name="middle_name" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Student Last Name:*</label>
												    <input type="text" name="last_name" class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											  <div class="col-md-4">
												  <div class="form-group">
													  <label for="exampleInputPassword1">Student Email:*</label>
													  <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
												  </div>
											  </div>

											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Mobile No:</label>
												    <input type="text" name="mobile_no" class="form-control">
											    </div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Alternate Mobile No:*</label>
												    <input type="number" name="mobile_no_2" class="form-control" required>
											    </div>
											</div>
								  		</div>
										<div class="row">
										<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Date of Birth: </label>
											        <input type="date" name="dob" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Place of Birth:</label>
												    <input type="text" name="place_of_birth" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="exampleInputPassword1">Mother Tongue:</label>
												    <input type="text" name="m_tongue" class="form-control">
											    </div>
											</div>
										</div>
										<div class="row">
										<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Home Address:</label>
												    <input type="text" name="current_address" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Native District:</label>
												    <input type="text" name="city" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Pincode:</label>
												    <input type="number" size="6" name="pin" class="form-control">
											    </div>
											</div>
										</div>
										<div class="row">	
										  <div class="col-md-4">
											  <div class="form-group">
												  <label for="exampleInputEmail1">Select Caste:</label>
												  <select class="browser-default custom-select" name="caste">
													<option value="Hindu">Hindu</option>
													<option value="Muslim">Muslim</option>
													<option value="Sikh">Sikh</option>
													<option value="Christain">Christain</option></select>
											  </div>
											</div>
											<div class="col-md-4">
											  <div class="form-group">
												  <label for="exampleInputEmail1">Select Sub-Caste:</label>
												  <select class="browser-default custom-select" name="sub_caste">
													<option value="2a">2A</option>
													<option value="2b">2B</option>
													<option value="obc">OBC</option>
													<option value="others">Others</option></select>
											  </div>
										    </div>
				  
										  <div class="col-md-4">
											  <div class="form-group">
												  <label for="exampleInputPassword1">Gender:</label>
												  <select class="browser-default custom-select" name="gender">
													<option>Select Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												  </select>
											  </div>
										  </div>
										</div>

								  		<div class="row">
											<div class="col-md-4">
												  <div class="form-group">
													  <label for="exampleInputPassword1">SSLC Percentage:*</label>
													  <input type="text" name="sslc_per" class="form-control">
												  </div>
											</div>		
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">SSLC Complition Date:*</label>
											        <input type="date" name="matric_complition_date" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">SSLC Exam Attempts:*</label>
											        <input type="text" name="matric_attempts" value="1" default="1" class="form-control">
											    </div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Select Course: </label>
											        <select class="browser-default custom-select" name="course_code">
													    <option >Select Course</option>
													    <?php
															$query="select course_code from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
															}
														?>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Register No:</label>
												    <input type="text" name="reg_no" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Date of Submission:</label>
												    <input type="text" id="currentdate" readonly name="dos" class="form-control">
											    </div>
											</div>
										</div>

										<div class="row">				
										<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Nationality</label>
												    <input type="text" name="nationality" value="Indian" readonly edia name="current_address" class="form-control">
											    </div>
											</div>	  	
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Student Status: </label>
											        <select class="browser-default custom-select" name="applicant_status">
													  <option>Select Option</option>
													  <option value="Admitted">Admitted</option>
													  <option value="Not Admitted">Not Admitted</option>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Application Status:</label>
												    <select class="browser-default custom-select" name="application_status">
													  <option>Select Option</option>
													  <option value="Approved">Approved</option>
													  <option value="Not Approved">Not Approved</option>
													</select>
											    </div>
											</div>
										</div>							
										
						
								  		<div class="row">
										    <div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload Your Image:</label>
												    <input type="file" name="profile_image" placeholder="Student Age" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Upload SSLC Certificate:</label>
												    <input type="file" name="matric_certificate" class="form-control" value="there is no image">
											    </div>
											</div>
								  		</div>
								  	
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
								  		<div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save" value="Submit Form">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									    </div>
									</form>
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
									<th>Reg No</th>
									<th>Student Name</th>
									<th>Course</th>
									<th>Admitted on</th>
									<th>City</th>
									<th>Profile</th>
									<th colspan="1">Operations</th>
								</tr>
								<?php 
								$query="select register_no,first_name,middle_name,last_name,course,native_city,date_of_submission,profile_image from student_information";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
									<tr>
										<td><?php echo $row["register_no"] ?></td>
										<td><?php echo $row["first_name"]." ".$row["middle_name"]." ".$row["last_name"] ?></td>
										<td><?php echo $row["course"] ?></td>
										<td><?php echo $row["date_of_submission"] ?></td>
										<td><?php echo $row["native_city"] ?></td>
										<!-- date_format($date,"Y/m/d H:i:s"); -->
										<td><?php  $profile_image= $row["profile_image"] ?>
										<img height='50px' width='50px' src=<?php echo "images/$profile_image"  ?> >
										</td>
										<td> 
											<?php 
												echo "<a class='btn btn-danger' href=delete-function.php?register_no=".$row['register_no'].">Delete</a> "
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