<!DOCTYPE html>
<html>
<head>
	
</head>
<?php
require('connection.php');
 $images=0;
 $users=0;
 $views=0;
if($con)
{
$query="SELECT * FROM IMAGES";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
$images=$images+1;
}
$query="SELECT * FROM USERS";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
$users=$users+1;
}
// $query="SELECT * FROM  DATA";
// $result=mysqli_query($con,$query);
// while($row=mysqli_fetch_array($result)){
// $views=$views+$row['views'];
// }
echo "</div>";
mysqli_close($con);
unset($con);
}


?>
<body>
<div class="col-xs-16 col-md-8 col-lg-4">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large" id="images"><?php echo $images;?></div>
							<div class="text-muted">Photos</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-16 col-md-8 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large" id="users"><?php echo $users;?></div>
							<div class="text-muted">Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-16 col-md-8 col-lg-4">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large" id="views"><?php echo $views;?></div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div>
</body>
</html>