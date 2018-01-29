<?php
require('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>healthix</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<br /><br /><br />
		<ul class="nav menu">
			<li ><a href="index2.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			
			<li><a href="index2.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>All Patients</a></li>
			<br />
<a href="register.php">
			<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()" style="margin-left:20px;"> <span class="glyphicon glyphicon-plus" aria-hidden="true" class="btn btn-info btn-lg" >Add Patient</span></button>
			</a>
			<br /><br />
			<a href="attend.php"><button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()" style="margin-left:20px;"> <span class="glyphicon glyphicon" aria-hidden="true" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" >Attend Patient</span></button></a>
			<br />
			<br />
			<a href="view.php"><button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()" style="margin-left:20px;"> <span class="glyphicon glyphicon" aria-hidden="true" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal" >View Submited Tests</span></button></a>
				<li role="presentation" class="divider"></li>
			<li><a href="logout.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout Page</a></li>
		</ul>
		
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="panel panel-default">
	<br />
		<div class="panel-heading">New Patient Registration</div>
		<div class="panel-body">
			
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6"><form method="POST" action="">
<?php
if(isset($_POST['submit'])){
 
 $fname=$_POST['fname'];
 $mname=$_POST['mname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $contact=$_POST['contact'];
 $dob=$_POST['dob'];
 
 
 
    
$conn=mysqli_connect('localhost','root','','maskan');

$sq=mysqli_query($conn,"SELECT email FROM agents WHERE email='$email'");
$e_check=mysqli_num_rows($sq);
if($e_check==0){
$query="INSERT  into agents(fname,mname,lname,email,contact,dob)
values('$fname','$mname','$lname','$email','contact','$dob')";
$insert=mysqli_query($conn,$query);
if(!$insert){
echo"no insertion".mysql_error(); 
}
else
{
   
  header('location:users.php');
 }
}
else{
    echo "<div class='alert alert-warning' role='alert'> The mail already exist</div>";
}
 





}


?>

        <div class="form-group">
        <label >Firstname</label>
        <input  class="form-control"  type="text" name="fname" placeholder="firstname" required>
        </div>
        <div class="form-group">
        <label >Middlename</label>
        <input  class="form-control"  type="text" name="mname" placeholder="middlename" required>
        </div>
        <div class="form-group">
        <label >Lastname</label>
        <input  class="form-control"  type="text" name="lname" placeholder="lastname" required>
        </div>
        <div class="form-group">
        <label >Email</label>
        <input  class="form-control"  type="email" name="email" placeholder="email" required>
        </div>
        
         <div class="form-group">
        <label for="username">Phone number</label>
        

        <input  class="form-control"  type="text" name="contact" placeholder="phn no" 
         required>
        </div>
         <div class="form-group">
        <label for="password">Date Of Birth</label>
        <input  class="form-control"  type="text" name="dob" placeholder="DD/MM/YYYY" required>
        </div>
        
          
        <br />
        <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
        <br /> <br />
</form></div></div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</div>		
		
		
	</div><!--/.main-->
	<div id="result"></div>
</body>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<!-- <script type="text/javascript">
	
	function allow(id,payment){
	    var URL="allow_payment.php?id=";
		var id2=id.toString();
		    URL=URL.concat(id2); 
		    URL=URL.concat("&payment=");
		    URL=URL.concat(payment);  
	  $.ajax({
      url:URL,
      success:(function (result){
$('#result').html(result);
    
      })
    });

	}
</script> -->
</html>
