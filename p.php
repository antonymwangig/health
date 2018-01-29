<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row"><div class="col-lg-12">
			
				<h1 class="page-header">Payments</h1>
				<div class="panel-body">
			</div>
		</div><!--/.row-->
				<div class="row" border="5px">
			<div class="col-sm-2">
				<h3 class="page-header">House Id</h3>
			</div>
			<div class="col-sm-2">
				<h3 class="page-header">Agent</h3>
			</div>
			<div class="col-sm-4">
				<h3 class="page-header">Transaction</h3>
			</div>
			<div class="col-sm-2">
				<h3 class="page-header">permission</h3>
			</div>
		</div>
		</div>
		<!--/.row-->
						<?php
						$con=mysqli_connect('localhost','root','','maskan');

if($con)
{
$query1="SELECT * FROM agents";
$result1=mysqli_query($con,$query1);
while($row=mysqli_fetch_array($result1)){

$id=$row['id'];
$fname=$row['fname'];
$lname=$row['lname'];
?>
<div class="row">
			<div class="col-sm-2">
				<h4 class="page-header"><?php echo $id; ?></h4>
			</div>
			<div class="col-sm-2">
				<h4 class="page-header"><?php echo $fname; ?></h4>
			</div>
			<div class="col-sm-4">
				<h4 class="page-header"><?php echo $lname; ?></h4>
			</div>

		</div>
<?php

}



mysqli_close($con);
unset($con);
}


?>
							
</div>	