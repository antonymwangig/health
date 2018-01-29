<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Healthix</title>

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
    

        <div class="panel-heading">Submitted Tests</div>
        <div class="panel-body">
            
        <table width="100%" >
                <tr>
                    <th style="font-family:courier">Id</th>
                    <th style="font-family:courier">Firstname</th>
                    <th style="font-family:courier">Lastname</th>
                    <th style="font-family:courier">type</th>
                    <th style="font-family:courier">Diagnosis</th>
                    <th style="font-family:courier">Tests</th>
                    <th style="font-family:courier">lab</th>
                    <th style="font-family:courier">agency</th>
                    
                </tr>
            
            
             

        
            </div>
        </div>
    </div>      
        
        
    </div><!--/.main-->   <?php

if($con)
{

$result=mysqli_query($con,"SELECT *FROM patients");
while($row=mysqli_fetch_array($result)){

$id=$row['id'];
 $fname=$row['fname'];
 $lname=$row['lname'];
 $type=$row['type'];
 $lab=$row['lab'];
 $test=$row['test'];
 $diagnosis=$row['diagnosis'];
 $agency=$row['agency'];

 ?>
 <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $fname; ?></td>
   
    <td><?php echo $lname; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $lab; ?></td>
    <td><?php echo $test; ?></td>
    <td><?php echo $diagnosis; ?></td>
     <td><?php echo $agency; ?></td>
  
   
   
    
</tr>

<?php

}
}
?>

</table>
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
